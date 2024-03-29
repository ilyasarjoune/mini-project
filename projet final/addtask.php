
<?php
// Include database connection file
include("src/db.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get form data
    $iduser = $_GET['iduser'];
    $categoryId = $_GET['category_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    if($status == 1){
        $status = 'Not started';
    }
    elseif ($status == 2) {
        $status = 'In progress';
    }
    elseif($status == 3) {
        $status = 'Done';
    }
    $deadline = $_POST['deadline'];

    // SQL query to update task details in the database
    $sql = " insert into task(IDTask,IDuser,idCAT,titleT,descriptionT,statu,deadline) values(null,?,?,?,?,?,?)";
    
    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "iissss", $iduser,$categoryId, $title, $description, $status, $deadline);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Redirect to tasks page with success message
        header("Location: home.php?category_id= $categoryId");
        exit();
    } else {
        // Redirect to tasks page with error message
        header("Location: home.php?");
        exit();
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
        <label class="form-label fw-bold">Task Title</label>
        <input type="text" class="form-control" name="title" value="">
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">Description</label>
        <textarea class="form-control" rows="3" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">Status</label>
        <select class="form-select" aria-label="Default select example" name="status">
            <option value="1" >Not started</option>
            <option value="2" >In progress</option>
            <option value="3">Done</option>
        </select>
    </div>
    <div class="mb-3">
    <label class="form-label">Deadline</label>
    <input type="date" class="form-control" name="deadline" value="<?php echo date('Y-m-d', strtotime($deadline)); ?>">
</div>

    <button type="submit" class="btn btn-primary">ADD TASK</button>
</form>


</div>
</body>
</html>