<?php
class Comment
{
    protected
    $_ID,
    $_newsID,
    $_author,
    $_content,
    $_datePosted,
    $_reports;


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
    public function setID($var)            { $var = (int) $var; $this->_ID = $var; }
    public function setNewsID($var)        { $var = (int) $var; $this->_newsID = $var; }
    public function setAuthor($var)        { $var = (string) $var;  $this->_author = $var; }
    public function setContent($var)       { $var = (string) $var;  $this->_content = $var; }
    public function setDatePosted($var)    { $this->_datePosted = $var; }
    public function setReports($var)       { $var = (int) $var; $this->_reports = $var; }
    /////////////////////////

    // GETTERS ////////////
    public function getID()                { return $this->_ID; }
    public function getNewsID()            { return $this->_newsID; }
    public function getAuthor()            { return $this->_author; }
    public function getContent()           { return $this->_content; }
    public function getDatePosted()        { return $this->_datePosted; }
    public function getReports()           { return $this->_reports; }
    /////////////////////////
}