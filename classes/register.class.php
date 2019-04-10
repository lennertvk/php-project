<?php

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
            //@todo: form validation
            
            $options = [
				'cost' => 16, //je schrijft 2^14, hash wordt dus 4096x uitgevoerd, hacker moet gokken welke macht wij gekozen hebben, duurt ook langer, met brute force kan je veel minder pogingen doen per minuut
			];
			$password = password_hash($this->password, PASSWORD_DEFAULT, $options); //PASSWORD_DEFAULT is constant, gaat niet wijzigen
			
			try{
				$conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
				$statement = $conn->prepare("INSERT INTO users (email, password) VALUES(:email, :password)");
				//gaat injectie tegen, er is geen $_POST, zijn 2 gaten waar nog iets moet binnenkomen
				$statement->bindParam(":email", $this->email);
				$statement->bindParam(":password", $password); //hier niet $this-> gebruiekne want dat is niet veilig
				//plakt niks in query tot je runt, bindValue stopt direct in query (ook zonder runnen)
				//bindParam gaat quotes negeren
				$statement->execute();
				//geeft true of false terug zodat je weet of het gelukt is
				$result = $statement->execute();
				return $result; 
				//om te zien wat er uit komt
			}catch (Throwable $t){
				//echo "er liep iets mis";
                //echo $t->getMessage();
                echo "<h1>ER LIEP IETS MIS</h1>"
                return false;
			}
		}

        }