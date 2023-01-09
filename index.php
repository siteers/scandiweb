<!DOCTYPE html>
<html lang="pl">
<html>
<head>
    <meta charset="utf-8"/>
    <title>juniortest.Krzysztof.Sitko.com/</title>
    <link rel='stylesheet' type='text/css' href='styles.css'/>
    <style>

</style>
</head>

<body>
<h1><b>Product list</b><hr></h1>

<form method="POST" action='index.php'>
<a href='product-add.php'><h2 class='h2'><input type="button" name="button1" value="ADD" class='button'></h2></a>
  
<?php
#PHP CODE SHOW ADDED DATA IN "PRODUCT-ADD.PHP" FROM MYSQL 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "test1";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("connectnio failed: ". $connection->connect_error);
    }

    $sql = "SELECT * FROM products";
    $result = $connection->query($sql);
    $query = mysqli_query($connection,$sql);

    if (!$result){
        die("invalid query: ". $connection->error);
    }
    while($row = mysqli_fetch_array($query)){
        
#this "if" causes the correct extensions to be displayed
        if($row['weight']=="" && $row['size'] == ""){

        echo "
        <div class='container'><input type='checkbox' name='checkbox[]' class='delete-checkbox' value='".$row['id']."'
        <b><br>$row[sku]<br>$row[name]<br>$row[price] $<br>Dimension: $row[height]x$row[width]x$row[lenght]</b></div>
        ";}
        elseif($row['height']=="" && $row['size']=="" && $row['width']=="" && $row['lenght']=="" ){

        echo "
        <div class='container'><input type='checkbox' name='checkbox[]' class='delete-checkbox' value='".$row['id']."'
        <b><br>$row[sku]<br>$row[name]<br>$row[price] $<br>Weight: $row[weight] kg<br></b></div>
        ";}
        elseif($row['height']=="" && $row['weight']=="" && $row['width']=="" && $row['lenght']=="" ){

        echo "
        <div class='container'><input type='checkbox' name='checkbox[]' class='delete-checkbox' value='".$row['id']."'
        <b><br>$row[sku]<br>$row[name]<br>$row[price] $<br>Size: $row[size] MB<br></b></div>
        ";}    
    }
?>

<h2 class='h1'><input type="submit" name="delete" value="MASS DELETE" id='delete-product-btn' class='button'></h2>  

<?php

#THIS PHP CODES CAUSES DELETE DATA FROM MYSQL SERVER AND INDEX.PHP
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "test1";

    $connection = new mysqli($servername, $username, $password, $database);
    if ($connection->connect_error) {
        die("connectnio failed: ". $connection->connect_error);
    }

    if(isset($_POST['delete'])) {
        $checkbox = $_POST['checkbox'];
        foreach ($checkbox as $id) {
        mysqli_query($connection,"DELETE FROM products WHERE id=".$id);}
        header("location:index.php"); }
        mysqli_close($connection);     
?>   
</form>
        
</body>
</html>