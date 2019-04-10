<?php

	require_once("classes/register.class.php");

	  if(!empty($_POST)){
			$user = new User();
			$user->setEmail($_POST['email']);
			$user->setPassword($_POST['password']);
		/*	$user->passwordconfirmation($_POST['password_confirmation']); */

			$email = $_POST['email'];
			$password = $_POST['password'];
			$passwordConfirmation = $_POST['password_confirmation'];
			$result = $user->register();
		}
	



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
.hidden{
    display: none;
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
					<label for="email">Email</label>
					<input type="text" id="email" name="email">
				</div>
				<div class="form__field">
					<label for="password">Password</label>
					<input type="password" id="password" name="password">
				</div>

                <div class="form__field">
					<label for="password_confirmation">Confirm your password</label>
					<input type="password" id="password_confirmation" name="password_confirmation">
				</div>

				<div class="form__field">
					<input type="submit" value="Sign me up!" class="btn btn--primary">	
				</div>
			</form>
		</div>
	</div>
    <!--
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script>
	$('#email').keyup((e)=>{
		let textinput = $('#email').val();
		//console.log(textinput);

		$.ajax({
			method: "GET",
			url: "ajax/username.php",
			data: { textinput: textinput },
			dataType: 'json'
			})

			console.log($result.status);
	});


		// keyup
	//tekstvak uitlezen
	// ajax met jquery axios of fetch
		// text moet meegestuurd worden van de username
	
	//nu naar php
	// statische methode aan klasse user geven ==> user::available('username')
	//json antwoord jaa/nee

	// terug naar js in de frontend ui update
	</script>
    -->
</body>
</html>