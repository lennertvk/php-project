<?php
    require_once("../bootstrap.php");

    if( !empty($_POST) ){
        // comment text
        $text = $_POST['text'];
        $imgid = $_POST['id'];
        //postId en userId staan fake in query dus nu ni in code zette

        // opslaan in DB
        try{
            $c = new Comment();
            $c->setText($text);
            $c->setImgid($imgid);
            $c->save();

            $result = [
                "status" => "success",
                "message" => "comment was saved",
            ];
        } catch(Throwable $t){
            $result = [
                "status" => "error",
                "message" => "something went yeet",
            ];
        }
        
        // antwrd aan js frontend (json)
        echo json_encode($result);
    }

?>