<?php

require_once('bootstrap.php');

    class Upload{
        private $image;
        private $desc;
        private $imagemini;
        private $location;

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
         * Get the value of desc
         */ 
        public function getDesc()
        {
                return $this->desc;
        }

        /**
         * Set the value of desc
         *
         * @return  self
         */ 
        public function setDesc($desc)
        {
                $this->desc = $desc;

                return $this;
        }

                /**
         * Get the value of imagemini
         */ 
        public function getImagemini()
        {
                return $this->imagemini;
        }

        /**
         * Set the value of imagemini
         *
         * @return  self
         */ 
        public function setImagemini($imagemini)
        {
                $this->imagemini = $imagemini;

                return $this;
        }

                /**
         * Get the value of location
         */ 
        public function getLocation()
        {
                return $this->location;
        }

        /**
         * Set the value of location
         *
         * @return  self
         */ 
        public function setLocation($location)
        {
                $this->location = $location;

                return $this;
        }

        public function uploadBig(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("INSERT INTO images (image, text, datum, tijd, place) VALUES (:image, :desc, CURDATE(), CURTIME(), :place)");
            $statement->bindParam(":image", $this->image);
            $statement->bindParam(":desc", $this->desc);
            $statement->bindParam(":place", $this->location);

            $result = $statement->execute();
            return $result;
        }

        public function uploadSmall(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("INSERT INTO images (image, text, minified, datum, tijd, place) VALUES (:imagemini, :desc, '1', CURDATE(), CURTIME(), :place)");
            $statement->bindParam(":imagemini", $this->imagemini);
            $statement->bindParam(":desc", $this->desc);
            $statement->bindParam(":place", $this->location);

            $result = $statement->execute();
            return $result;
        }




}