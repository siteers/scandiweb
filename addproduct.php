<?php
ob_start();
?>
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
        
<a href='index.php'><h2 class='h1'><input type="button" name="submit2" value="Cancell" class="button"></h2></a>

    
<form method='POST'>Type switcher:
        <select name="switcher" id='productType'>
            <option selected disabled>--select--</option>
            <option id='DVD' name="DVD">DVD</option>
            <option id='Book' name="Book">Book</option>
            <option id='Furniture' name="Furniture">Furniture</option>
            <input type="submit" name="submit20" value="ok" class='button'><br></form>
        </select>
        
<form id='product_form' method='POST'>    
        <br><br>
        
        <label for='text1'>SKU:</label><input type='text'name='sku' required placeholder= "Please, provide SKU"size='20' id='sku'><br><br>
        <label for='text2'>Name:</label><input type='text'name='name' required placeholder= "Please, provide name"size='20' id='name'><br><br>
        <label for='text3'>Price ($):</label><input type='number'name='price' required placeholder= "Please, provide price"size='20' id='price'><br><br>

        <a href='https://siteers.000webhostapp.com/index.php'><h2 class='h2'><input type="submit" name="submit1" value="Save" class="button"></h2></a>
<?php
#PHP CODE TAKES DATA FROM TEXTBOXES AND SEND IT TO MYSQL SERVER
if (isset($_POST['submit1'])){
    error_reporting(0);
    $username = "id20124426_products_test1";
    $password = "19071997209Jj@";
    $servername = "localhost";
    $database = "id20124426_products";


    $sku=$_POST["sku"];
    $name=$_POST["name"];
    $price=$_POST["price"];
    $weight=$_POST["weight"];
    $size=$_POST["size"];
    $height=$_POST["height"];
    $width=$_POST["width"];
    $lenght=$_POST["lenght"];
    header("Location:https://siteers.000webhostapp.com/index.php");

    #CODE CHECKED IF SKU ALREADY EXIST

    $connect = new mysqli($servername, $username, $password, $database);
    $check = "SELECT * FROM products WHERE sku = '$_POST[sku]'";
    $rs = mysqli_query($connect,$check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    if ($data[0]>1)
    {   
        echo "<b>SKU Already in Exists!!!<br>Please try again<br/><b>";
        exit;
    }
    else {
    $query = "INSERT INTO `products`(`sku`, `name`, `price`, `weight`, `size`, `height`, `width`, `lenght`) VALUES ('$sku','$name','$price','$weight','$size','$height','$width','$lenght')";

    $result = mysqli_query($connect,$query);
    
    mysqli_close($connect);
    
    header("Location:https://siteers.000webhostapp.com/index.php");
    exit;

    }
    }
?>
<?php
#switcher with button make another textboxes appear    
if(isset($_POST['submit20'])){
    if(isset($_POST['switcher']) == "Book"){
        if($_POST['switcher']=="Book"){
        echo "<label for='txt'>Weight (kg):</label><input type='number'name='weight' required placeholder= 'Please, provide weight' size='20' id='weight'><br><br>";
        }      
    }}
    
    {if(isset($_POST['switcher']) == "DVD") 
    {if($_POST['switcher']=="DVD"){
        
        echo "<label for='txt'>Size (MB):</label><input type='number'name='size' required placeholder= 'Please, provide size' size='20' id='size'><br><br>";
        }        
    }}

    {if(isset($_POST['switcher']) == "Furniture") {
    {if($_POST['switcher']=="Furniture"){
        
        echo "<label for='txt'>Height (cm)</label><input type='number'name='height'required placeholder= 'Please, provide height' size='20' id='height'><br><br>";
        
        echo "<label for='txt'>Width (cm)</label><input type='number'name='width'required placeholder= 'Please, provide width' size='20' id='width'><br><br>";
        
        echo "<label for='txt'>Lenght (cm)</label><input type='number'name='lenght'required placeholder= 'Please, provide lenght' size='20' id='lenght'><br><br>";
        }     
    }}}
?>
</form>
</body>
</html>