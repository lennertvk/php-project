<?php
require_once('bootstrap.php');
class Post{
    private $img;
    private $searchResult;

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

    public function search(){
        $query = $_GET['search'];
        $conn = Db::getInstance();
        $statement= $conn->prepare("SELECT * FROM images Where text like :query AND minified = 1");
        $statement->bindValue(":query",'%'.$query.'%',PDO::PARAM_STR);
        $statement->execute();
        $searchResult = $statement -> fetchAll();
        //return $searchResult;
        var_dump( $searchResult);
    }
}
?>