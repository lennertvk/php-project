<?php
    class CheckingSession{
        public function checkSession($sessionemail){
            if(isset($sessionemail)){
                return true;
            }else{
                header('Location: login.php');
            }
        }
        //uitzoeken welke id onze sessie heeft
        public function searchId($sessionemail){
            $conn = Db::getInstance();
            $statement= $conn->prepare("SELECT * FROM users Where email like :email ");
            $statement->bindParam(":email", $sessionemail);
            $statement->execute();
            $idResult = $statement -> fetchAll();
            return $idResult;
        }
    }