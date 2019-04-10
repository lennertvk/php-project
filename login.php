<?php
    
    require_once("classes/login.class.php");

    if(!empty($_POST['Email']) && !empty($_POST['Password'])){
        //is het formulier compleet?
        
        $user = new User();
        $user->setEmail($_POST['Email']);
        $user->setPassword($_POST['Password']);
        
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        
        $result = $user->login();
        
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
                    <input type="text" name="Email" id="Email">
                </div>
                <div class="form__field">
                    <label for="Password">Password</label>
                    <input type="password" id="Password" name="Password">
                </div>

                <div class="form__field">
                    <input type="submit" value="Sign in" class="btn btn--primary">
                    <input type="checkbox" id="rememberMe"><label for="rememberMe" class="label__inline">Remember me</label>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
