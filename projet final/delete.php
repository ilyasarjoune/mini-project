<?php 

include("src/db.php");
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $categoryId = $_GET['category_id'];
    $sql= "delete from task where IDTask = $id";
$rslt=mysqli_query($conn,$sql);
if ($rslt) {
    header("Location: home.php?category_id=  $categoryId ");
   
}else {
    
    echo 'Error';
}

}




?>
