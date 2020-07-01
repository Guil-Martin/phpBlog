<?php
require_once(ROOT . 'Models/NewsManager.php');
require_once(ROOT . 'Models/News.php');
require_once(ROOT . 'Models/Comment.php');

class newsController extends Controller
{
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

        $this->set($d);
        $this->render("index");
    }

    /////// ARTICLES
    public function article($ID) {

        $ID = (int) $ID;
        
        $newsManager = new NewsManager();

        $news = $newsManager->showNews($ID);

        if (isset($news))
        {
            $d['News'] = $news;
            $d['Comments'] = $newsManager->showComments($ID);

            $this->set($d);
            $this->render("article");
        }
        else { require_once(ROOT . 'Views/404.php'); }
    }
    
    public function category($category)
    {     
        $data = $this->secure_input($category);

        $newsManager = new NewsManager();

        $news = $newsManager->showNewsByCategory($data);

        if (isset($news))
        {
            $d['News'] = $news;
            $this->set($d);
            $this->render("category");
        } 
        else { require_once(ROOT . 'Views/404.php'); }
    }
    
    ///////

    /////// COMMENTS
    public function createComment($ID)
    {
        if (isset($_POST['author']) && !empty($_POST['author']) && isset($_POST['content']) && !empty($_POST['content'])) 
        {
            $ID = (int) $ID;
            $data = $this->secure_form($_POST); // Secure user input
            $data['newsID'] = $ID; // Push article id in the data

            $newsManager = new NewsManager();
            $newsManager->createComment($data);
        }

        // redirect on article page
        header("Location: " . WEBROOT . "news/article/" . $ID . "#commentForm");
    }

    public function report(...$data)
    { // Executed from AJAX request on article's comments
        if (isset($data[0]) && isset($data[1])) {
            $data[0] = (int) $data[0];
            $data[1] = (int) $data[1];
            $newsManager = new NewsManager();
            $newsManager->addReportOnComment($data);
        }
        //$this->render("report");
    }
    ///////

}