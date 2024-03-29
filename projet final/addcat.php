
<?php
// Include database connection file
include("src/db.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get form data
    $iduser = $_GET['iduser'];
    
    $name = $_POST['name'];
    $description = $_POST['description'];
    

    // SQL query to update task details in the database
    $sql = "INSERT INTO `category` (`IDCAT`, `nameC`, `descriptionC`, `userid`) VALUES (NULL, ?,?,?); ";
    
    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "ssi", $name, $description, $iduser);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Redirect to tasks page with success message
        header("Location: home.php");
        exit();
    } else {
        // Redirect to tasks page with error message
       echo "error";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>
<body >
<div class="container">

<form method="POST" >
    <input type="hidden" name="task_id" value="">
    <div class="mb-3">
        <label class="form-label fw-bold">Category Name</label>
        <input type="text" class="form-control" name="name" value="">
    </div>


    <div class="mb-3">
        <label class="form-label fw-bold">Description</label>
        <textarea class="form-control" rows="3" name="description"></textarea>
    </div>
    
  

    <button type="submit" class="btn btn-primary">ADD CATEGORY</button>
</form>


</div>
</body>
</html>