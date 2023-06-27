<?php echo '<link rel="stylesheet" type="text/css" href="/main.css">'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <div class="login-form">
    <form method="post" action="/pages/components/auth.php">

      <label for="username">
        Username: &nbsp;
      </label>
      <input type="text" id="username" name="username" class="loginbox" required>
      <br />
      <label for="password">
        Password: &nbsp;
      </label>
      <input type="password" id="password" name="password" class="loginbox" required>
      <br />
      <input type="submit" value="Submit" id="login-btn">
    </form>
  </div>
</body>
</html>
