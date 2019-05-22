<?php

//methode dat de klasse user is bv. zodat login en register niet dezelfde code hebben staan

    class User{
        private $email;
        private $fullname;
        private $password;
        private $passwordconfirmation;
        private $passwordlogin;


        private $bio;
        private $image;
        private $user_id;
        //TEMP FILES FOR IMAGE UPLOAD
        private $ImageName;
        private $ImageSize;
        private $ImageTmpName;


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
                if (empty($email)) {
                    throw new Exception("Email cannot be empty");
                }
                else {
                $this->email = htmlspecialchars($email);

                return $this;
                }
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
            if (empty($fullname)) {
                throw new Exception("fullname cannot be empty");
                }
                else {
                $this->fullname = htmlspecialchars($fullname);
                }
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
                $options = [
                    'cost' => 16, 
                ];
                //$this->password = password_hash($this->password, PASSWORD_DEFAULT, $options);
                $this->password = password_hash($this->password, PASSWORD_DEFAULT);

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

                /**
         * Get the value of passwordlogin
         */ 
        public function getPasswordlogin()
        {
                return $this->passwordlogin;
        }

        /**
         * Set the value of passwordlogin
         *
         * @return  self
         */ 
        public function setPasswordlogin($passwordlogin)
        {
                $this->passwordlogin = $passwordlogin;

                return $this;
        }

        public function register(){            
            $options = [
                'cost' => 16, 
            ];

            $password = password_hash($this->password, PASSWORD_DEFAULT, $options); 
            
			try{
                $conn = Db::getInstance();
                //$conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
				$statement = $conn->prepare("INSERT INTO users (email, password, fullname) VALUES(:email, :password, :fullname)");
				$statement->bindParam(":email", $this->email);
				$statement->bindParam(":password", $password); 
                $statement->bindParam(":fullname", $this->fullname);

                $result = $statement->execute();
                if($result === true){
                session_start();
                $_SESSION["email"] = $this->email;
                
                header("Location: index.php");
                }
                return $result; 
                
			}catch (Throwable $t){

                return false;

			}
        }
        
        public function login(){
        
            try{
                //$conn = Db::getInstance();
                $conn= new PDO("mysql:host=ID280780_phpproject.db.webhosting.be;dbname=ID280780_phpproject;","ID280780_phpproject","admin1234", null);
                $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
                
                //parameter binden
                $statement->bindParam(":email", $this->email);
                $result = $statement->execute();
                
                //array overzetten naar variable
                $user = $statement->fetchAll();

                $options2 = [
                        'cost' => 16, 
                    ];
                    $check = "check";
                if (password_verify($this->passwordlogin, $user[0]['password'])) {
                    echo 'Password is valid!';
                    session_start();
                    header('Location: index.php');
                    return true;
                }
                 else {
                       // var_dump($this->passwordlogin);
                       // var_dump($user[0]['password']);
                     echo 'Password is invalid!';
                    //display error message
                    return false;
            
                }
            }
            catch (Throwable $t){
                echo "<h1>ER LIEP IETS MIS</h1>";
            }
        }

        /*-- update functions --*/

         /**
         * Get the value of bio
         */ 
        public function getBio()
        {
                return $this->bio;
        }

        /**
         * Set the value of bio
         *
         * @return  self
         */ 
        public function setBio($bio)
        {
                $this->bio = htmlspecialchars($bio);

                return $this;
        }

        /**
         * Get the value of image
         */ 
        public function getImage()
        {
                return $this->image;
        }

        /**
         * Set the value of image
         *
         * @return  self
         */ 
        public function setImage($image)
        {
                $this->image = $image;

                return $this;
        }
        /**
         * Get the value of ImageName
         */ 
        public function getImageName()
        {
                return $this->ImageName;
        }

        /**
         * Set the value of ImageName
         *
         * @return  self
         */ 
        public function setImageName($ImageName)
        {
                $this->ImageName = $ImageName;

                return $this;
        }

        /**
         * Get the value of ImageSize
         */ 
        public function getImageSize()
        {
                return $this->ImageSize;
        }

        /**
         * Set the value of ImageSize
         *
         * @return  self
         */ 
        public function setImageSize($ImageSize)
        {
                $this->ImageSize = $ImageSize;

                return $this;
        }

        /**
         * Get the value of ImageTmpName
         */ 
        public function getImageTmpName()
        {
                return $this->ImageTmpName;
        }

        /**
         * Set the value of ImageTmpName
         *
         * @return  self
         */ 
        public function setImageTmpName($ImageTmpName)
        {
                $this->ImageTmpName = $ImageTmpName;

                return $this;
        }
        /**
         * Get the value of user_id
         */ 
        public function getUser_id()
        {
                return $this->user_id;
        }

        /**
         * Set the value of user_id
         *
         * @return  self
         */ 
        public function setUser_id($user_id)
        {
                $this->user_id = htmlspecialchars($user_id);
                return $this;
        }
        
        public function getUserInfo() {
                //DB CONNECTIE
                $conn = Db::getInstance();
                //$conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);

                //QUERY WHERE USER = $_SESSION
                $statement = $conn->prepare("SELECT * FROM users WHERE id = :user_id LIMIT 1");
                $statement->bindParam(":user_id", $this->user_id);
                $statement->execute();
                $result = $statement->fetch();
                return $result;
        }

        public function update() {
                //DB CONNECTIE
                $conn = Db::getInstance();
                //$conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);

                //QUERY UPDATE
                $statement = $conn->prepare("UPDATE users SET fullname=:fullname,email=:email,bio=:bio,image=:image WHERE id = :user_id");
                $statement->bindParam(":user_id", $this->user_id);
                $statement->bindParam(":fullname", $this->fullname);
                $statement->bindParam(":email", $this->email);
                $statement->bindParam(":bio", $this->bio);
                $statement->bindParam(":image", $this->image);
                $statement->execute();
                return $statement;
        }

        public function updatePassword() {
                $conn = Db::getInstance();
                //$conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
                $statement = $conn->prepare("UPDATE users SET password = :password WHERE id = :user_id");
                $statement->bindParam(":user_id", $this->user_id);
                $statement->bindParam(":password", $this->password);
                $statement->execute();
                return $statement;    
        }


        //save profile image into folder profile
        public function SaveProfileImg() {
                $file_name = "user_id" . "-" . time() . "-" . $this->ImageName;
                $file_size = $this->ImageSize;
                $file_tmp = $this->ImageTmpName;
                $tmp = explode('.', $file_name);
                $file_ext = end($tmp);
                $expensions = array("jpeg", "jpg", "png", "gif");
        
                if (in_array($file_ext, $expensions) === false) {
                        throw new Exception("extension not allowed, please choose a JPEG or PNG or GIF file.");
                }
        
                if ($file_size > 2097152) {
                        throw new Exception('File size must be smaller than 2 MB');
                }
        
                if (empty($errors) == true) {
                        move_uploaded_file($file_tmp, "images/profile/" . $file_name);
                        return "images/profile/" . $file_name;
                } else {
                        echo "Error";
                }
        }

        public function profileId($query){
                $conn = Db::getInstance();
                $statement= $conn->prepare("SELECT * FROM users Where id like :query");
                $statement->bindValue(":query",'%'.$query.'%',PDO::PARAM_STR);
                $statement->execute();
                $User = $statement -> fetchAll();
                return $User;
        }



    }