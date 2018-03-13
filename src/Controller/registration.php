<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $firstName = $_POST['signup-firstname'] ?? null;
    $lastName = $_POST['signup-lastname'] ?? null;
    $username = $_POST['signup-username'] ?? null;
    $password = $_POST['signup-password'] ?? null;
    $confirmationPassword = $_POST['signup-password-confirm'] ?? null;
    
    $firstNameHasError = (is_string($firstName) && strlen($firstName) > 2);
    $lastNameHasError = (is_string($lastName) && strlen($lastName) > 2);
    $userNameHasError = (is_string($username) && strlen($username) > 2);
    $passwordHasError = ($password == $confirmationPassword && strlen($password > 5));
    
    if ($firstNameHasError && $lastNameHasError && $userNameHasError && $passwordHasError) {
        try {
            $connection = Service\DBConnector::getConnection();
        } catch (PDOException $exception) {
            http_response_code(500);
            echo 'A problem occured, contact support';
            exit(10);
        }
        
        $sql = "INSERT INTO user(first_name, last_name, user_name, password) VALUES (\"$username\", \"$password\", \"$username\", \"$password\")";
        $affected = $connection->exec($sql);
        
        if (! $affected) {
            echo implode(', ', $connection->errorInfo());
            return;
        }
        
        return;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<!-- BOOSTRAP CSS IMPORT -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">
</head>
<body>
	<h1 class="app-name">Registration</h1>
	<form id="registration-form" action="/index.php/registration"
		method="POST">
		<label for="signup-firstname">First name: </label> <input type="text"
				class="form-control" name="signup-firstname"
				placeholder="Enter first name..."
				value="<?php echo htmlentities($firstName ?? '') ;?>">
		<div class="form-group">

		</div>
		<?php if(!($firstNameHasError ?? true)){?>
            <div class="has-error">
			<p>First name is not correct, please enter at least 3 characters!</p>
		</div>
      	<?php }?>
		<div class="form-group">
			<label for="signup-lastname">Last name: </label> <input type="text"
				class="form-control" name="signup-lastname"
				placeholder="Enter last name..."
				value="<?php echo htmlentities($lastName ?? '') ;?>">
		</div>
		<?php if(!($lastNameHasError ?? true)){?>
            <div class="has-error">
			<p>Last name is not correct, please enter at least 3 characters!</p>
		</div>
      	<?php }?>
		<div class="form-group">
			<label for="signup-username">Username: </label> <input type="text"
				class="form-control" name="signup-username"
				placeholder="Enter user name..."
				value="<?php echo htmlentities($username ?? '') ;?>">
		</div>
    	<?php if(!($userNameHasError ?? true)){?>
            <div class="has-error">
			<p>User name is not correct, please enter at least 3 characters!</p>
		</div>
      	<?php }?>
		<div class="form-group">
			<label for="signup-password">Password</label> <input type="password"
				class="form-control" name="signup-password" placeholder="Password"
				value="<?php echo htmlentities($password ?? '') ;?>">
		</div>
		<div class="form-group">
			<label for="signup-password-confirm">Confirmation Password</label> <input
				type="password" class="form-control" name="signup-password-confirm"
				placeholder="Confirm"
				value="<?php echo htmlentities($confirmationPassword ?? '') ;?>">
		</div>
		<?php if(!($passwordHasError ?? true)){?>
            <div class="has-error">
			<p>Password is not correct, confirmation does not match / at least 6
				characters!</p>
		</div>
      	<?php }?>
		<button type="submit" class="btn btn-primary btn-block">Register</button>
	</form>

	<!-- JQUERY AND BOOSTRAP SCRIPT IMPORT -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
		integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
		crossorigin="anonymous">
	</script>
	<script type="text/javascript" src="/js/script.js"></script>
</body>
</html>



