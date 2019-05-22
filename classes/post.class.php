<?php
require_once('bootstrap.php');
class Post{
    private $img;
    private $searchResult;
    private $User;

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }
/**
     * Get the value of searchResult
     */ 
    public function getSearchResult()
    {
        return $this->searchResult;
    }

    /**
     * Set the value of searchResult
     *
     * @return  self
     */ 
    public function setSearchResult($searchResult)
    {
        $this->searchResult = $searchResult;

        return $this;
    }
    
    public function search($query){
        $conn = Db::getInstance();
        $statement= $conn->prepare("SELECT * FROM images Where titel like :query AND minified = 1");
        $statement->bindValue(":query",'%'.$query.'%',PDO::PARAM_STR);
        $statement->execute();
        $searchResult = $statement -> fetchAll();
        return $searchResult;
    }
    
    public function photoId($query){
        $conn = Db::getInstance();
        $statement= $conn->prepare("SELECT * FROM images Where id like :query");
        $statement->bindValue(":query",'%'.$query.'%',PDO::PARAM_STR);
        $statement->execute();
        $photoId = $statement -> fetchAll();
        return $photoId;
    }
}
?>