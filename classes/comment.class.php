<?php
class Comment
{
    private $text;
    private $imgid;

	public static function getAll(){
        $conn = Db::getInstance();
        $result = $conn->query("select * from comments where id_image = 114 order by id asc");
        
        // fetch all records from the database and return them as objects of this __CLASS__ (Post)
        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }
    public function getComments(){
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from comments where id_image = :id_image order by id asc");
        $statement->bindValue(":id_image", $this->getImgid());
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }

    public function Save(){
        
        $conn = Db::getInstance();
        $statement = $conn->prepare("insert into comments (id_image, text) values (:id_image, :text)");
        $statement->bindValue(":id_image", $this->getImgid());
        $statement->bindValue(":text", $this->getText());
        return $statement->execute();        
    }

    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
    /**
     * Get the value of imgid
     */ 
    public function getImgid()
    {
        return $this->imgid;
    }

    /**
     * Set the value of imgid
     *
     * @return  self
     */ 
    public function setImgid($imgid)
    {
        $this->imgid = $imgid;

        return $this;
    }
}