<?php

// inspiration from https://www.youtube.com/watch?v=fteypJId9GA

class Http{

    public function get_data($start, $limit){
        $conn = new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
        $statement = $conn->prepare("SELECT * FROM images WHERE minified = 1 LIMIT $start, $limit");
        $result = $statement->execute();  
        $result = $statement->fetchAll();

        return $result;
    }
}

if(isset($_GET["start"])){
    $start = $_GET["start"];
   // $limit = $_GET["limit"];
   $limit = 1;

    $http = new Http();
    $data = $http->get_data($start, $limit);

    echo json_encode($data);
}