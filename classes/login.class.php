<?php

    class User{
        private $email;
        private $password;
        
    public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
        
        return $this;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
        
        return $this;
	}
        
    public function login(){
        
        try{
            $conn = new PDO("mysql:host=mysql338.webhosting.be:3306;dbname=ID280780_phpproject;","ID280780_phpproject","test1234", null);
            $statement = $conn->prepare("select * from users where email = :email");
            
            //parameter binden
            $statement->bindParam(":email",$this->email);
            $result = $statement->execute();
            
            //array overzetten naar variable
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($this->password, $user['password'])) {
                echo 'Password is valid!';
                session_start();
                //header('Location: index.php');
                return true;
            }
             else {
                 echo 'Password is invalid!';
                //display error message
                return false;
        
            }
        }
        catch (Throwable $t){
            echo "<h1>ER LIEP IETS MIS</h1>";
        }
    }
        
    }
?>