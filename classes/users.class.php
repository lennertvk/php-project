<?php

//methode dat de klasse user is bv. zodat login en register niet dezelfde code hebben staan

    class User{
        private $email;
        private $fullname;
        private $password;
        private $passwordconfirmation;


        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of fullname
         */ 
        public function getFullname()
        {
                return $this->fullname;
        }

        /**
         * Set the value of fullname
         *
         * @return  self
         */ 
        public function setFullname($fullname)
        {
                $this->fullname = $fullname;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of passwordconfirmation
         */ 
        public function getPasswordconfirmation()
        {
                return $this->passwordconfirmation;
        }

        /**
         * Set the value of passwordconfirmation
         *
         * @return  self
         */ 
        public function setPasswordconfirmation($passwordconfirmation)
        {
                $this->passwordconfirmation = $passwordconfirmation;

                return $this;
        }

        public function register(){            
            $options = [
                'cost' => 16, 
            ];

            $password = password_hash($this->password, PASSWORD_DEFAULT, $options); 
            
			try{
                $conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
				$statement = $conn->prepare("INSERT INTO users (email, password, fullname) VALUES(:email, :password, :fullname)");
				$statement->bindParam(":email", $this->email);
				$statement->bindParam(":password", $password); 
                $statement->bindParam(":fullname", $this->fullname);

                $result = $statement->execute();
                if($result === true){
                    header("Location: index.php");
                }
                return $result; 
                
			}catch (Throwable $t){

                return false;

			}
        }
        
        public function login(){
        
            try{
                $conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
                $statement = $conn->prepare("select * from users where email = :email");
                
                //parameter binden
                $statement->bindParam(":email",$this->email);
                $result = $statement->execute();
                
                //array overzetten naar variable
                $user = $statement->fetch(PDO::FETCH_ASSOC);
                
                if (password_verify($this->password, $user['password'])) {
                    //echo 'Password is valid!';
                    session_start();
                    header('Location: index.php');
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