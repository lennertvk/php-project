<?php
///// MOET NOG IN HET MAPJE VAN CLASSES
// inspiration from https://www.youtube.com/watch?v=fteypJId9GA

class Http{

    public function get_data($start, $limit){
        $conn = new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
        $statement = $conn->prepare("SELECT * FROM images WHERE minified = 1 LIMIT $start, $limit");
        $result = $statement->execute();  
        $result = $statement->fetchAll();
        return $result;
    }

    public function get_likes(){
        $conn = new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
        $statement = $conn->prepare("SELECT * FROM likes WHERE user_id=1");
        $result = $statement->execute();  
        $result = $statement->fetchAll();
        return $result;
    }

    public function get_all_data(){
        $conn = new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
        $statement = $conn->prepare("SELECT * FROM images");
        $result = $statement->execute();  
        $result = $statement->fetchAll();
        return $result;
    }
}

if(isset($_GET["start"])){
    $start = $_GET["start"];
    $limit = $_GET["limit"];
 // $limit = 1;

    $http = new Http();
    $data = $http->get_data($start, $limit);
    $data2 = $http->get_likes();
    $data3 = $http->get_all_data();

    $data = json_encode($data);
    $data2 = json_encode($data2);
    $data3 = json_encode($data3);

    $dataarray = array(
        'dataimage' => "$data",
        'datalikes' => "$data2",
        'alldata'   => "$data3"
    );

    echo json_encode($dataarray);
}