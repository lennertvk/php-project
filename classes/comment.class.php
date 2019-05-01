<?php
class Comment
{
    private $text;
    
	public static function getAll(){
        $id = $_GET['id'];
        $conn = Db::getInstance();
        $result = $conn->query("select * from comments where id_image = $id order by id asc");
        
        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function Save(){
        $id = $_GET['id'];
        $conn = Db::getInstance();
        $statement = $conn->prepare("insert into comments (id_image, text) values (:id_image, :text)");
        $statement->bindValue(":id_image", $id);
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

}
?>