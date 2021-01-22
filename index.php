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
    <title>Project</title>
    <style>
        body{
            text-align: center;
        }
        .box{
            width: 250px;
            text-align: center;
        }
        .main{
            margin: 0 auto;
            width: 250px;
        }
        header{
            text-align: center;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <header>
        <a href="show.php">Show Classmate Users</a>
        <br>
        _____________________________
        <br>
        <a href="index.php">Insert Classmate Users</a>
    </header>
<div class="main">
    <form action="index.php" method="post">
    <div class="box">
        <label for="t1">Name</label>
        <br>
        <input type="text" name="t1" id="t1">
    </div>
    <div class="box">
        <label for="t2">Family</label>
        <br>
        <input type="text" name="t2" id="t2">
    </div>
    <div class="box">
        <label for="t3">AGE</label>
        <br>
        <input type="text" name="t3" id="t3">
    </div>
    <div class="box">
        <br>
        <input type="submit" value="submit" name="submit">
    </div>
    <div class="box">
        <br>
        <input type="submit" value="CREATEDB" name="CREATEDB">
    </div>
    <div class="box">
        <br>
        <input type="submit" value="CREATETABLE" name="CREATETABLE">
    </div>

    </form>
</div>


<?php
//create db
if(isset($_POST['CREATEDB'])){
    try {
        $conn = new PDO("mysql:host=".SERVERNAME, DB_USERNAME, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE class";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "CREATE TABLE";
      } catch(PDOException $e) {
        echo "DB HAS BEEN CREATE.";
      }
      
      $conn = null;
}
?>





<?php
//create Table
if(isset($_POST['CREATETABLE'])){
    try {
        $conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE TABLE class (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            family VARCHAR(30) NOT NULL,
            age VARCHAR(50)
            )";
        $conn->exec($sql);
        echo "CREATE TABLE";
      } catch(PDOException $e) {
        echo "TABLE HAS BEEN CREATE";
      }
      
      $conn = null;
}
?>


<?php
//insert
if(isset($_POST['submit'])){
    try {
        $name=$_POST['t1'];
        $family=$_POST['t2'];
        $age=$_POST['t3'];
        $conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO class (name,family, age)VALUES ('$name', '$family', '$age')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "User Insert";
      } catch(PDOException $e) {
        echo "faild User Insert";
      }
      
      $conn = null;
}
?>

<?php
//create db
if(isset($_POST['CREATEDB'])){
    try {
        $conn = new PDO("mysql:host=".SERVERNAME, DB_USERNAME, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE class";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "CREATE TABLE";
      } catch(PDOException $e) {
        echo "DB HAS BEEN CREATE.";
      }
      
      $conn = null;
}
?>


</body>
</html>