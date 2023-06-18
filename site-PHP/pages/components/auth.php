<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  processForm($username, $password);
}

function processForm($username, $password) {

  $authenticated = false;

  // Open DB Connection
  $host = 'localhost';
  $database = 'ParadiseCoffee';
  $dbuser = getenv('POSTGRE_USER');
  $dbpass = getenv('POSTGRE_PASS');
  $db = pg_connect("host=$host dbname=$database user=$dbuser password=$dbpass");
  if (!$db) {
      echo "Failed to connect to PostgreSQL database.";
      exit;
  }

  $query = "SELECT * FROM phpauth WHERE username = '$username' AND password = '$password'";
  $result = pg_query($db, $query);
  if (!$result) {
      echo "Error executing the query.";
      exit;
  }
  while ($row = pg_fetch_assoc($result)) {
      if ($row['username'] == $username && $row['password'] == $password) {
        $tokenid = bin2hex(random_bytes(32));
        $tokenexpiry = time() + 43200;
        $query = "INSERT INTO authtoken (username, password, expiry, tokenid) VALUES ('$username', '$password', $tokenexpiry, '$tokenid')";
        $result = pg_query($db, $query);
        if (!$result) {
            echo "Error executing the insert query.";
            exit;
        }
        setcookie('user_token', $tokenid, $tokenexpiry, "/");
        $authenticated = true;
      }
      else {
        $authenticated = false;
      }
  }
  pg_free_result($result);
  pg_close($db);

  if ($authenticated) {
    header('Location: /pages/coffeevan.php');
    exit;
  }
  else {
    header('Location: /index.php');
    exit;
  } 
}
?>
