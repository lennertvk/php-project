<?php
class User {
    private $fullname;
    private $email;
    private $bio;
    private $image;


public function getFullname()
{
        return $this->fullname;
}

public function setFullname($fullname)
{
        $this->fullname = $fullname;

        return $this;
}

public function getEmail()
{
        return $this->email;
}

public function setEmail($email)
{
        $this->email = $email;

        return $this;
}

public function getBio()
{
        return $this->bio;
}

public function setBio($bio)
{
        $this->bio = $bio;

        return $this;
}

public function getImage()
{
        return $this->image;
}

public function setImage($image)
{
        $this->image = $image;

        return $this;
}


    public function update() {
        $conn= new PDO("mysql:host=mysql338.webhosting.be:3306;dbname=ID280780_phpproject;","ID280780_phpproject","test1234", null);
        $statement = $conn->prepare("UPDATE users SET fullname = :fullname,email=:email, bio = :bio, image=:image WHERE id = 1");
        $statement->bindParam(":fullname", $this->fullname);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":bio", $this->bio);
        $statement->bindParam(":image", $this->image);
        $result = $statement->execute();
        return $result;        
    }
}