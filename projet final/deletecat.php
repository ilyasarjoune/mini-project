<?php 

include("src/db.php");

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    
    // Delete tasks associated with the category
    $deleteTasksQuery = "DELETE FROM task WHERE idCAT = $id";
    $deleteTasksResult = mysqli_query($conn, $deleteTasksQuery);
    
    if ($deleteTasksResult) {
        // Then delete the category
        $deleteCategoryQuery = "DELETE FROM category WHERE IDCAT = $id";
        $deleteCategoryResult = mysqli_query($conn, $deleteCategoryQuery);

        if ($deleteCategoryResult) {
            // If deletion is successful, redirect to the category page
            header("Location: cat.php");
            exit();
        } else {
            echo 'Error deleting category.';
        }
    } else {
        echo 'Error deleting tasks associated with the category.';
    }
}

?>
