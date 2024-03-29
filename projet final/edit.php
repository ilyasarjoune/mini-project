<?php
// Include database connection file
include("src/db.php");

// Check if task ID is provided in the URL
if (isset($_GET['task_id'])) {
    // Get the task ID from the URL
    $task_id = $_GET['task_id'];
    $categoryId = $_GET['category_id'];
    // SQL query to fetch task details from the database based on task ID
    $sql = "SELECT * FROM task WHERE IDTask = ?";
    
    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "i", $task_id);
    mysqli_stmt_execute($stmt);

    // Get result
    $result = mysqli_stmt_get_result($stmt);

    // Check if data exists for the given task ID
    if (mysqli_num_rows($result) > 0) {
        // Fetch task details as an associative array
        $task = mysqli_fetch_assoc($result);

        // Assign task details to variables
        $title = $task['titleT'];
        $description = $task['descriptionT'];
        $status = $task['statu'];
        $deadline = $task['deadline'];
    }
}
?>
<?php
// Include database connection file
include("src/db.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get form data
    $task_id = $_GET['task_id'];
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
    $sql = "UPDATE task SET titleT = ?, descriptionT = ?, statu = ?, deadline = ? WHERE IDTask = ?";
    
    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "ssssi", $title, $description, $status, $deadline, $task_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Redirect to tasks page with success message
        header("Location: home.php?category_id= $categoryId");
        exit();
    } else {
        // Redirect to tasks page with error message
        header("Location: home.php?update=error");
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
    <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
    <div class="mb-3">
        <label class="form-label fw-bold">Task Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">Description</label>
        <textarea class="form-control" rows="3" name="description"><?php echo $description; ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">Status</label>
        <select class="form-select" aria-label="Default select example" name="status">
            <option value="1" <?php if ($status == "Not started") echo "selected"; ?>>Not started</option>
            <option value="2" <?php if ($status == "In progress") echo "selected"; ?>>In progress</option>
            <option value="3" <?php if ($status == "Done") echo "selected"; ?>>Done</option>
        </select>
    </div>
    <div class="mb-3">
    <label class="form-label">Deadline</label>
    <input type="date" class="form-control" name="deadline" value="<?php echo date('Y-m-d', strtotime($deadline)); ?>">
</div>

    <button type="submit" class="btn btn-primary">Update Task</button>
</form>


</div>
</body>
</html>