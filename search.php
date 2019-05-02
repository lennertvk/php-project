<?php
    
    require_once('bootstrap.php');
    $conn = Db::getInstance();
    $search = new Post();
    $searchResult=$search->search();
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h2>Resultaten</h2>
<?php
    /*if($searchCount > 0){
        while($searchResult = $searchCount){
            echo $searchResult;
        }
    }
    else{
        echo "no results";
    }*/
    
    foreach($searchResult as $key):
?>
<li><?php echo $key['text'] ?></li>
<?php endforeach; ?>
</body>
</html>