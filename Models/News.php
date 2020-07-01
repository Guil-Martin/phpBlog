<?php
class News
{
    protected 
    $_ID, // ID will be set by the create function of NewsManager
    $_author,
    $_authorID,
    $_title,
    $_category,
    $_excerpt,
    $_content,
    $_image,
    $_numComments,
    $_thumbnail,
    $_datePosted,
    $_dateEdited;

    public function __construct(array $data) 
    {
        foreach ($data as $key => $value) 
        {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    // SETTERS ////////////
    public function setID($var)            { $var = (int) $var;     $this->_ID = $var; }
    public function setAuthor($var)        { $var = (string) $var;  $this->_author = $var; }
    public function setAuthorID($var)      { $var = (string) $var;  $this->_authorID = $var; }
    public function setTitle($var)         { $var = (string) $var;  $this->_title = $var; }
    public function setCategory($var)      { $var = (string) $var;  $this->_category = $var; }
    public function setExcerpt($var)       { $var = (string) $var;  $this->_excerpt = $var; }
    public function setContent($var)       { $var = (string) $var;  $this->_content = $var; }
    public function setImage($var)         { $var = (string) $var;  $this->_image = $var; }
    public function setNumComments($var)   { $var = (int) $var;     $this->_numComments = $var; }
    public function setDatePosted($var)    { $this->_datePosted = $var; }
    public function setDateEdited($var)    { $this->_dateEdited = $var; }
    /////////////////////////

    // GETTERS ////////////
    public function getID()                { return $this->_ID; }
    public function getAuthor()            { return $this->_author; }
    public function getAuthorID()          { return $this->_authorID; }
    public function getTitle()             { return $this->_title; }
    public function getCategory()          { return $this->_category; }
    public function getExcerpt()           { return $this->_excerpt; }
    public function getContent()           { return $this->_content; }
    public function getImage()             { return $this->_image; }
    public function getDatePosted()        { return $this->_datePosted; }
    public function getDateEdited()        { return $this->_dateEdited; }
    public function getNumComments()       { return $this->_numComments; }
    /////////////////////////

    // public function move($var) { $this->_loc = $var; }
}