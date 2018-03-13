<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {}


?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <!-- BOOSTRAP CSS IMPORT -->
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  </head>
  <body id="body">
    <h1 class="app-name">Warehouse4</h1>
    <form id="login-form" action="/index.php/login.php" method="POST">
      <div class="form-group">
        <label for="username">Username</label> <input type="text"
        class="form-control" name="username" aria-describedby="usernameHelp"
        placeholder="Enter username"> <small id="usernameHelp"
        class="form-text text-muted">We'll never share your email with
        anyone else.</small>
      </div>
      <div class="form-group">
        <label for="password">Password</label> <input type="password"
        class="form-control" name="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-success btn-block">Login</button>
      <?php echo "<a href='/index.php/registration'>Want to register?</a>";  ?>
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
<script type="text/javascript" src="/js/script.js">
</script>
</body>
</html>
