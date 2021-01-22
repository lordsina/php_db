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
<header>
        <a href="show.php">Show Classmate Users</a>
        <br>
        _____________________________
        <br>
        <a href="index.php">Insert Classmate Users</a>
    </header>
    <br>
<?php
if(isset($_GET['id'])){
?>

<form action="./update.php" method="post">
<div class="box">
        <label for="t0">ID</label>
        <br>
        <input type="text"  value="<?php echo $_GET['id'];?>"disabled>
    </div>
    <input type="hidden" name="t0" id="t0" value="<?php echo $_GET['id'];?>">

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
        <input type="submit" value="update" name="update">
    </div>


</form>

<?php
}
?>


<?php
//update
if(isset($_POST['update'])){
    try {

        $id=$_POST['t0'];
        $name=$_POST['t1'];
        $family=$_POST['t2'];
        $age=$_POST['t3'];
        $conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("UPDATE class SET name=:name,family=:family,age=:age WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':family',$family);
        $stmt->bindParam(':age', $age);
        $stmt->execute();
      echo "user update"."<br>";

    }catch(PDOException $e) {
        echo "User not exist"."<br>";
      }
      $conn = null;

}
?>


<a href="./show.php">back in show users</a>
</body>
</html>