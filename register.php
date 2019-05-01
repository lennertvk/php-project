<?php

	require_once("classes/users.class.php");

	  if(!empty($_POST)){
        if ($_POST["password"] === $_POST["password_confirmation"]) {
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->setFullname($_POST['fullname']);

            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConfirmation = $_POST['password_confirmation'];
            $fullname = $_POST['fullname'];
            $result = $user->register();
         }
         else {
            echo "<p>de wachtwoorden komen niet overeen</p>";
         }

		}
	



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
.hidden{
    display: none;
}

.display{
    display: block;
}
</style>
<body>
	<div class="netflixLogin netflixLogin--register">
		<div class="form form--login">
			<form action="" method="post">
				<h2 form__title>Sign up for an account</h2>

				<div class="form__error hidden">
					<p>
						Some error here
					</p>
				</div>

                <div class="form__field">
					<label for="fullname">Fullname</label>
					<input type="text" id="fullname" name="fullname" placeholder="Fullname">
				</div>

				<div class="form__field">
					<label for="email">Email</label>
					<input type="text" id="email" name="email" placeholder="Email">
				</div>
				<div class="form__field">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" placeholder="Password">
				</div>

                <div class="form__field">
					<label for="password_confirmation">Confirm your password</label>
					<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
				</div>

				<div class="form__field">
					<input type="submit" value="Sign me up!" class="btn btn--primary">	
				</div>

				<div>
                    <a href="login.php" class="to_login">Already have an account? Login.</a>
                </div>
			</form>
		</div>
	</div>
</body>
</html>