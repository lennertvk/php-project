<?php
echo 'test<br>';

require_once 'classes/upload.class.php';

$upload = new Upload();
$upload->setImage("test");
$upload->setDesc("desc");

$result = $upload->uploadBig();

var_dump($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>test 2 pagina</h1>
</body>
</html>