<?php
    class Image{
        private $image;
        private $text;
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
        public function register(){            
			//try{
                                $conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
				$statement = $conn->prepare("INSERT INTO images (image, text) VALUES(:image, :text)");
                $statement->bindParam(":image", $this->image);
				$statement->bindParam(":text", $this->text); 
                $result = $statement->execute();
                return $result; 
         //   }catch (Throwable $t){
                
           //     echo "<h1>ER LIEP IETS MIS</h1>";
             //   return false;
			//}
		}
 
        }