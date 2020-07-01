<?php
require_once(ROOT . 'Models/Admin.php');
require_once(ROOT . 'Models/NewsManager.php');
require_once(ROOT . 'Models/News.php');
require_once(ROOT . 'Models/Comment.php');
require_once(ROOT . 'Models/Category.php');
require_once(ROOT . 'Models/SimpleImage.php');

class adminController extends Controller
{

    public function login()
    { // Treat login form
        $d = [];

        if (isset($_POST["name"]) && !empty($_POST["name"])
        && isset($_POST["password"]) && !empty($_POST["password"]))
        {
            
            $admin = new Admin();

            $data = $this->secure_form($_POST);

            $sqlInfos = $admin->getLoginInfo();

            $errors = [];

            // Check the name
            if ($data['name'] != $sqlInfos['userName']) 
            {
                $errors[] = 'Nom non valide';
            }
           
            // Check the password
            if (empty($errors)) {
                if (!password_verify($data['password'], $sqlInfos['password'])) 
                {
                    $errors[] = 'Mot de passe non valide';
                }
            }

            if (empty($errors)) 
            {
                $_SESSION['authenticated'] = true; // To allow the display of admin views
                header("Location: " . WEBROOT . "admin/index");
                return;
            }

            $d['Errors'] = $errors;
        }
        
        $this->set($d);
        $this->render("login");
    }

    public function index(...$data)
    {
        $newsManager = new NewsManager();

        $page = 1;
        if (isset($data[0])) { $page = (int) $data[0]; } // Receive page number from param url

        $countNews = $newsManager->countNews();

        $numPerPage = NEWS_PER_PAGE;
        $numPages = ceil($countNews / $numPerPage);
        $d['NumPages'] = $numPages;

        $page = $page == (0 ? 1 : $page < 0) ? 1 : $page; // Something else passed in url or previous on page 1
        $page = $page > $numPages ? $numPages : $page; // Page max?
        $d['CurrentPage'] = $page;

        $d['News'] = $newsManager->showNewsByPage($page);

        $this->layout = "admin";
        $this->set($d);
        $this->render("index");
    }

    public function showComments($ID)
    {
        $ID = (int) $ID;

        $newsManager = new NewsManager();

        $d['News'] = $newsManager->showNews($ID);
        $d['Comments'] = $newsManager->showComments($ID);

        $this->layout = "admin";
        $this->set($d);
        $this->render("comments");
    }

    public function showMostReported()
    {
        $admin = new Admin();

        $d['Comments'] = $admin->listMostReported();

        $this->layout = "admin";
        $this->set($d);
        $this->render("reportedComments");
    }

    public function create()
    {
        $admin = new Admin();

        // Get categories for radio in form in the view
        $d['Category'] = $admin->getCategories();
        
        $errors = []; // Treat form data, fills a error array to display if needed
        if (isset($_POST['title']))
        {
            if ($admin->checkArticleExists($_POST['title'])) {
                $errors[] = "Article - Le titre de cet article semble déjà exister.";
            }

            if (empty($_POST['category'])) {
                $errors[] = "Catégorie - La catégorie n'a pas été choisie.";
            }

            if (empty($_POST['content'])) {
                $errors[] = "Contenu - Le contenu de l'article est vide.";
            }

            if (isset($_FILES) && !empty($_FILES['image']['name'])) {

                if (empty($errors)) 
                    { // Check if there is errors so far to prevent
                    // upload of an image if there are some

                    $file = $_FILES["image"]["tmp_name"];
                    $name = basename($_FILES["image"]["name"]); // basename() may prevent filesystem traversal attacks;
                    $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                    
                    if (in_array($extension, array('jpg', 'png', 'jpeg', 'gif')))
                    { // Allow only some formats
                    // preg_match("`^[-0-9A-Z_\.]+$`i",$name)
                    // mb_strlen($name,"UTF-8") > 225) ? true : false

                        $rename = preg_replace('/\s+/', '_', $_POST['title'])  . '.' . $extension;
                                                
                        // ===== Resize & upload using SimpleImage class
                        $target_folder = ROOT . "images/news/articles/";
                        $target_file = $target_folder . $rename;
                        $image = new SimpleImage();
                        $image->load($_FILES['image']['tmp_name']);
                        $image->resize(NEWS_IMAGE_W, NEWS_IMAGE_H);
                        $image->save($target_file);
                        $_POST['image'] = $rename;                   

                    }  else 
                    { 
                        $errors[] = "Image - Seuls les formats JPG, JPEG, PNG & GIF sont autorisés."; 
                    }
                }
            } else 
            { // No image uploaded, set empty string
                $_POST['image'] = ''; 
            }

            if (empty($errors)) { // No error ? insert in database
                $admin->create($_POST);
                header("Location: " . WEBROOT . "admin/index");
                return;
            }

            // Adds post data to prefill form on failure
            $d['POST'] = $_POST;

        }

        // add errors to data send to view
        $d['Errors'] = $errors;

        // Displays the form
        $this->layout = "admin";
        $this->set($d);
        $this->render("create");
    }

    public function edit($ID)
    {
        $ID = (int) $ID;

        $admin = new Admin();
        $newsManager = new NewsManager();

        $news = $newsManager->showNews($ID);
        $d['News'] = $news;
        
        if (isset($news))
        { // Check if the article exists
            $errors = []; // Treat form data, fills a error array to display if needed
            $d['Category'] = $admin->getCategories();

            if (isset($_POST['title']) && !empty($_POST['title']))
            {
                if (!isset($_POST['category']) || empty($_POST['category'])) {
                    $errors[] = "Catégorie - La catégorie n'a pas été choisie.";
                }
    
                if (!isset($_POST['content']) || empty($_POST['content'])) {
                    $errors[] = "Contenu - Le contenu de l'article est vide.";
                }

                if (isset($_FILES) && !empty($_FILES['image']['name'])) {

                    if (empty($errors)) 
                        { // Check if there is errors so far to prevent
                        // upload of an image if there are some
    
                        $file = $_FILES["image"]["tmp_name"];
                        $name = basename($_FILES["image"]["name"]); // basename() may prevent filesystem traversal attacks;
                        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                        
                        if (in_array($extension, array('jpg', 'png', 'jpeg', 'gif')))
                        { // Allow only some formats
                        // preg_match("`^[-0-9A-Z_\.]+$`i",$name)
                        // mb_strlen($name,"UTF-8") > 225) ? true : false
    
                            if (!empty($news[0]->getImage())) { // Delete old image file
                                unlink(ROOT . "images/news/articles/" . $news[0]->getImage());
                            }

                            $rename = preg_replace('/\s+/', '_', $_POST['title'])  . '.' . $extension;
                                                    
                            // ===== Resize & upload using SimpleImage class
                            $target_folder = ROOT . "images/news/articles/";
                            $target_file = $target_folder . $rename;
                            $image = new SimpleImage();
                            $image->load($_FILES['image']['tmp_name']);
                            $image->resize(NEWS_IMAGE_W, NEWS_IMAGE_H);
                            $image->save($target_file);
                            $_POST['image'] = $rename;

                        }  else 
                        { 
                            $errors[] = "Image - Seuls les formats JPG, JPEG, PNG & GIF sont autorisés."; 
                        }
                    }
                } else 
                { // No image uploaded, set default
                    if (!empty($news[0]->getImage())) {
                        $_POST['image'] = $news[0]->getImage(); 
                    } else {
                        $_POST['image'] = '';
                    }
                }

                $d['Edited'] = $_POST;
                
                if (empty($errors)) // No error ? insert in database
                {
                    $admin->edit($d);
                    header("Location: " . WEBROOT . "admin/index");
                    return;
                }
            }

            $d['Errors'] = $errors; // Eventual errors to diplay

            $this->layout = "admin";
            $this->set($d);
            $this->render("edit");            

        } else { require_once(ROOT . 'Views/404.php'); } 
    }
 
    public function delete($ID)
    { // Called by ajax function
        $ID = (int) $ID;

        $admin = new Admin();
        $newsManager = new NewsManager();

        $news = $newsManager->showNews($ID);
        
        if (!empty($news[0]->getImage())) { // Delete image file
            unlink(ROOT . "images/news/articles/" . $news[0]->getImage());
        }

        $admin->delete($ID);
    }

    public function deleteComment($ID)       
    { // Returns most reported comment list for the admin section
        $ID = (int) $ID;

        $admin = new Admin();
        $admin->deleteComment($ID);
    }

}