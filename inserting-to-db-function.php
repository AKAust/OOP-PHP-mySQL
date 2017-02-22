//load db connection
  require_once("config/db0.php");
//load db class
  require_once("classes/Db.php");


  $db = new Db();    

  // Quote and escape form submitted values
  $name = $db -> quote($_POST['username']);
  $email = $db -> quote($_POST['email']);

  // Insert the values into the database
  $result = $db -> query("INSERT INTO `users` (`name`,`email`) VALUES (" . $name . "," . $email . ")");
