<?php
define('SERVERNAME','localhost');
define('DB_NAME','class');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
    <style>
            body{
            text-align: center;
        }
    </style>
</head>
<body>
<?php
//create db
if(isset($_GET['id'])){
    try {
        $id=$_GET['id'];
        $conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM class WHERE id=$id";
        $conn->exec($sql);
        echo "User Delete"."<br>";
      } catch(PDOException $e) {
        echo "User not exist"."<br>";
      }
      
      $conn = null;
}
?>
<a href="./show.php">back in show users</a>
</body>
</html>