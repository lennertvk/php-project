<?php
    class CheckingSession{
        public function checkSession($sessionemail){
            if(isset($sessionemail)){
                return true;
            }else{
                header('Location: login.php');
            }
        }
    }