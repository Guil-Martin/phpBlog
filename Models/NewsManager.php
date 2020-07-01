<?php

class NewsManager extends Model
{

    /////// ARTICLES
    public function showAllNews()
    {
        $sql = "SELECT * FROM news ORDER BY datePosted DESC";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();

        $news = [];
        while ($data = $req->fetch()) 
        { 
            $news[] = new News($data); 
        }
    
        return (!empty($news)) ? $news : null;
    }

    public function countNews()
    { // Returns the total number of news in the database
        $sql = "SELECT COUNT(*) as total FROM news";
        $req = Database::getBdd()->prepare($sql);
    
        $req->execute();

        $data = $req->fetch();

        return (int) $data['total']; 
    }

    public function showNewsByPage($page)
    {
        $numPerPage = NEWS_PER_PAGE;
        $offset = (($page - 1) * $numPerPage);
    
        $sql = "SELECT 
        COUNT(comments.ID) AS numComments, 
        news.* 
        FROM news
        LEFT JOIN comments ON news.ID = comments.newsID
        GROUP BY news.ID
        ORDER BY datePosted DESC LIMIT :offset, :numElts";
        $req = Database::getBdd()->prepare($sql);
        $req->bindValue(':numElts', $numPerPage, PDO::PARAM_INT);
        $req->bindValue(':offset', $offset, PDO::PARAM_INT);
    
        $req->execute();

        $news = [];
        while ($data = $req->fetch()) 
        { 
            $news[] = new News($data); 
        }

        return (!empty($news)) ? $news : null;
    }

    public function showNews($ID)
    { // Returns the list of all articles
        $sql = "SELECT * FROM news WHERE ID = " . $ID;

        $req = Database::getBdd()->prepare($sql);

        $req->execute(); //$arr = $req->errorInfo(); print_r($arr); 

        $news = [];
        while ($data = $req->fetch()) 
        { 
            $news[] = new News($data); 
        }

        return (!empty($news)) ? $news : null; 
    }

    public function getCategoryList() {
        $tags = [];

        $sql = "SELECT name, id FROM tags";
        $req = Database::getBdd()->prepare($sql);

        while ($data = $req->fetch()) 
        { 
            $tags[$data['id']] = $data['name']; 
        }

        return (!empty($tags)) ? $tags : false;
    }

    public function getCategory($ID) {
        $sql = "SELECT name FROM tags WHERE ID = ".$ID;
        $req = Database::getBdd()->prepare($sql);
        $data = $req->fetch();

        return (!empty($data)) ? $data['name'] : false;
    }

    public function showNewsByCategory($category) {

        $sql = "SELECT * FROM news WHERE category = :category ORDER BY datePosted DESC";
        $req = Database::getBdd()->prepare($sql);
        $req->bindValue(':category', $category);
   
        $req->execute();

        $news = [];
        while ($data = $req->fetch()) 
        { 
            $news[] = new News($data); 
        }

        return (!empty($news)) ? $news : null;
    }
    ///////

    /////// COMMENTS
    public function showComments($ID)
    { // Returns comments on the article
        $sql = "SELECT * FROM comments WHERE newsID = ? ORDER BY datePosted DESC";
        $req = Database::getBdd()->prepare($sql);

        $req->execute([$ID]);
        //$arr = $req->errorInfo(); print_r($arr);

        $comments = [];
        while ($data = $req->fetch()) 
        {   
            $comments[] = new Comment($data);
        }

        return (!empty($comments)) ? $comments : null; 
    }

    public function countComments($ID)
    { // Returns the total number of comments for this article
        $sql = "SELECT COUNT(*) as total FROM comments WHERE ID = :id";
        $req = Database::getBdd()->prepare($sql);

        $req->bindValue(':id', $ID, PDO::PARAM_INT);
    
        $req->execute();

        $data = $req->fetch();

        return (int) $data['total']; 
    }

    public function createComment($data)       
    { // Creates a comment on the article

        // Creates a comment object to add it to the db
        $comment = new Comment($data);

        $sql = "INSERT INTO comments
        (author, content, newsID, datePosted)
        VALUES
        (:author, :content, :newsID, NOW())";

        $req = Database::getBdd()->prepare($sql);
        
        $req->bindValue(':author', $comment->getAuthor());
        $req->bindValue(':content', $comment->getContent());
        $req->bindValue(':newsID', $comment->getNewsID());

        $req->execute();

        // set id
        $comment->setID(Database::getBdd()->lastInsertId());
    }

    public function addReportOnComment($data)       
    { // Adds a report to the total of report on the comment

        $ID = (int) $data[0];
        $newsID = (int) $data[1];

        $sql =  "UPDATE comments SET reports = reports + 1 WHERE ID = ? AND newsID = ?";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$ID, $newsID]);
    }
    ///////

}