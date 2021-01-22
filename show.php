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
    <title>show</title>
    <style>
        body{
            text-align: center;
        }
        table, th, td {
  border: 1px solid black;
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
<table style="width:100%">
  <tr>
    <th>id</th>
    <th>name</th>
    <th>family</th>
    <th>Age</th>
    <th>delete/update</th>
  </tr>


  <?php
        $conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM class");
        $stmt->execute();
        $row= $stmt->rowCount();
        if($row>0){
            foreach($stmt->fetchAll() as $v) {
                
                echo "<form action='delete.php' method='get' ><tr>";
                echo "<td>".$v['id']."</td><td>".$v['name']."</td><td>".$v['family']."</td><td>".$v['age']."</td><td><a href='./delete.php?id=".$v['id']."'>delete</a> / <a href='./update.php?id=".$v['id']."'>edit </a></td>";
                echo "</tr></form>";
            }
        }else{
            return false;
        }


?>
</table> 

</body>
</html>