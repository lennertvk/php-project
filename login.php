<?php
    require_once("classes/user.class.php");
    $conn = new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
    $statement = $conn->prepare("SELECT * FROM reported_images");
    $result = $statement->execute();  
    $result = $statement->fetchAll();

    var_dump($result);
/*
    $conn= new PDO("mysql:host=localhost;dbname=php-project;","root","", null);
    $admin = "admin@admin.com";
    $statement = $conn->prepare("SELECT * FROM users WHERE email = '$admin'");
    $result = $statement->execute();
    $user = $statement->fetchAll();

    var_dump($user);
*/
/*
$hash = '$2y$16$HduIzziNeBVOA8rDcmZf6eDogVYwBLdO0QkBdMcxqHFJTv6bPdORW';
var_dump($hash);
if (password_verify('test', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
/*
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        //is het formulier compleet?
        
        $user = new User();        
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user->setEmail($email);
        $user->setPasswordlogin($password);
        
        $result = $user->login();

        //var_dump($email);
        //var_dump($password);

        if($result == false){
            $error = true;
        }
    }

/*
sql injectie
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IMDFlix</title>
    <link rel="stylesheet" href="css/reset.css">    
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="netflixLogin">
        <div class="form form--login">
            <form action="" method="post">
                <h2 form__title>Log in</h2>

                <?php if( isset($error) ): ?>
                <div class="form__error">
                    <p>
                        Sorry, we can't log you in with that email address and password. Can you try again?
                    </p>
                </div>
                <?php endif; ?>

                <div class="form__field">
                    <label for="Email">Email</label>
                    <input type="text" name="email" id="Email" placeholder="Your email here">
                </div>
                <div class="form__field">
                    <label for="Password">Password</label>
                    <input type="password" id="Password" name="password" placeholder="Your password here">
                </div>

                <div class="form__field">
                    <input type="submit" value="Sign in" class="btn btn--primary">
                    <input type="checkbox" id="rememberMe"><label for="rememberMe" class="label__inline">Remember me</label>
                </div>

                <div>
                    <a href="register.php" class="registerlink">No account yet? Register here.</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
