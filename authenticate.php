<?php
require_once 'login.php';
session_start();

function sanitizeString($var) {
  //global $pdo;
  $var = strip_tags($var);
  $var = htmlentities($var);
  $var = stripslashes($var);
  //$var = $pdo->quote($var);
  return $var;
}

if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = sanitizeString($_POST['email']);
  //echo $_POST['password'];
  $password = sanitizeString($_POST['password']);

  $query = $pdo->prepare("SELECT CustomerID, FirstName, LastName, Password FROM Customers WHERE Email = ?");
  $query->bindParam(1, $email, PDO::PARAM_STR);
  $query->execute();
  $user = $query->fetch();

  if ($user) {
    if (password_verify($password, $user['Password'])) {
      $_SESSION['name'] = $user['FirstName'] . " " . $user['LastName'];
      $_SESSION['id'] = $user['CustomerID'];
      header("Location: index.php");
    } else {
      //echo $user['Password'];
      echo "Incorrect email or password. Please try again1.";
    }
  } else {
    echo "Incorrect email or password. Please try again.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <form action="authenticate.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" value="Log In">
  </form>
</body>
</html>
