<?php
    require_once('classes/user.class.php');

    if (!empty($_POST)) {
        
        $user = new User();
        $user->setFullname($_POST['fullname']);
        $user->setEmail($_POST['email']);
        $user->setBio($_POST['bio']);

        $email = $_POST['email'];
        $fullname = $_POST['fullname'];
        $bio = $_POST['bio'];
        
        $result = $user->update();
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test</title>
</head>
<body>
<form action="" method="post">
    
    <label for="fullname">fullname</label>
    <br>
    <input type="text" name="fullname" id="fullname">
    <br>
    <label for="email">email</label>
    <br>
    <input type="text" name="email" id="email">
    <br>
    <label for="bio">bio</label>
    <br>
    <input type="text" name="bio" id="bio">
    <br>

    <button type="submit" class="btnSubmit">submit</button>
</body>
</html>