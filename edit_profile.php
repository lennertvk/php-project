<?php 
include_once("bootstrap.php");
//include_once("classes/user.class.php");

$user = new User();
$user->setUser_id(13);
$profile = $user->getUserInfo();

if(!empty($_POST["edit"])) {
    
    if(!empty($_FILES['profileImg']['name'])) {
        $saveImage = new User();
        $nameWithoutSpace = preg_replace('/\s+/','',$_FILES['profileImg']['name']);
        $nameWithoutSpaceTMP = preg_replace('/\s+/','',$_FILES['profileImg']['tmp_name']);
        $nameWithoutSpaceSize = preg_replace('/\s+/','',$_FILES['profileImg']['size']);
        $saveImage->SetImageName($nameWithoutSpace);
        $saveImage->SetImageSize($nameWithoutSpaceSize);
        $saveImage->SetImageTmpName($nameWithoutSpaceTMP);
        $destination = $saveImage->SaveProfileImg();
    } else {
        $destination = $profile['image'];
    }

    $user_edit = new User();
    $user_edit->setUser_id(13);
    $user_edit->setFullname($_POST["fullname"]);
    $user_edit->setEmail($_POST["email"]);
    $user_edit->setBio($_POST["bio"]);
    $user_edit->setImage($destination);
    if($user_edit->update()){
        $message = "Your profile is updated.";
    } else {
        $error = "Something went wrong, profile isn't updated.";
    }
}

//password update
if(!empty($_POST["passwordedit"]) && !empty($_POST["password"]) && !empty($_POST["repassword"])){
    if(strcmp($_POST['password'], $_POST["repassword"]) == 0){
        $user_pass = new User();
        $user_pass->setUser_id(13);
         $user_pass->setPassword($_POST['password']);
        if($user_pass->updatePassword()){
            $message = "Password updated";
        }
    } else {
        $error = "Passwoorden moeten gelijk zijn";
    }
} else {
    $error = "Invullen aub.";
}

$profile = $user->getUserInfo();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php include_once('includes/nav.inc.php')?>

<h1>Edit profile</h1>
    <form method="post" action="" enctype="multipart/form-data" class="edit_profile">
            <h2>Profile info</h2>
            <label for="profileImg">Current picture</label>
            <img src="<?php echo $profile['image'] ?>" alt="">
            <input type="file" name="profileImg" id="profileImg" accept="image/gif, image/jpeg, image/png, image/jpg">

        <div class="formitem">
            <label for="fullname">fullname</label>
            <input type="text" name="fullname" id="fullname" value="<?php echo $profile['fullname']; ?>">
        </div>

        <div class="formitem">
            <label for="bio">Bio</label>
            <textarea rows="4" cols="50" name="bio" id="bio"><?php echo $profile['bio'];?></textarea>
        </div>

        <div class="formitem">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="<?php echo $profile['email']; ?>">
        </div>

            <input type="submit" name="edit" value="Update profile">
    </form>

    <form method="post" action="" class="edit_profile">
            <h2>Wachtwoord aanpassen</h2>
            <div class="formitem">
            <label for="password">New password</label>
            <input type="password" name="password" id="password" placeholder="New password">
        </div>

        <div class="formitem">
            <label for="repassword">Retype New password</label>
            <input type="password" name="repassword" id="repassword" placeholder="Retype New password">
        </div>

            <input type="submit" name="passwordedit" value="Update password">
    </form>
</body>
</html>