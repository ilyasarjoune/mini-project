<?php 



include("src/db.php");
if(!isset($_SESSION['valid'])){
 header("Location: index.php");
}


$id = $_SESSION['id'];
if ($_GET['category_id']){
$categoryId = $_GET['category_id'] ;
}
else{
    $categoryId= 1;
}

    $queryy = "select * from task 
    where IDuser = $id and idCAT = $categoryId";
    $result = mysqli_query($conn,$queryy);

?>



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
      
        <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
    rel="stylesheet"
  />
<style>
.content-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    width: 100%;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    letter-spacing: 0.3ch;
}

.content-table thead tr {
    background-color: black;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
}

.content-table th,
.content-table td {
    padding: 12px 15px;
}

.content-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}


.edit{
    text-decoration: none;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 1rem;
    text-align: center;
    
    letter-spacing: 0.3ch;
    
    width: 100%;
    color: rgb(19, 255, 255);
}
.delete{
    text-decoration: none;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 1rem;
    text-align: center;
    
    letter-spacing: 0.3ch;
    color: rgb(255, 0, 0);
    width: 100%;

}
svg{
    width: 2rem;
    min-width: 2rem;
    margin: 0 1.5rem;
   
}
.add{
    
    text-decoration: none;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 1rem;
    text-align: center;
   
    
    color:  #23232e;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-end;

}
        </style>
    </head>
    <body>
    
   
                
               <a href="addtask.php?iduser=<?php echo $id; ?>&category_id=<?php echo $categoryId; ?>" class="add"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>  
               add task  </a>
                <table class="content-table">
    
    
    
<thead>
                    <tr >
                        <th> TITLE </th>
                        <th> DESCRIPTION </th>
                        <th> STTATU </th>
                        <th> DUE DATE </th>
                        <th> EDIT  </th>
                        <th> DELETE </th>
                    </tr>
                    </thead>
                    <?php 
                            
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $TITLE= $row['titleT'];
                                $description = $row['descriptionT'];
                                $statu = $row['statu'];
                                $deadline = $row['deadline'];
                                $idT = $row["IDTask"];
                    ?>
                            <tr>
                                <td><?php echo $TITLE ?></td>
                                <td><?php echo $description ?></td>
                                <td><?php echo $statu ?></td>
                                <td><?php echo $deadline ?></td>
                                <td><a href="edit.php?task_id=<?php echo $idT; ?>&category_id=<?php echo $categoryId; ?>" class="edit">Edit</a></td>
                                <td><a href="delete.php?deleteid=<?php echo $idT; ?>&category_id=<?php echo $categoryId; ?>" class="delete">Delete</a></td>

                            </tr>        
                    <?php 
                            }  
                    ?>                                                                    
                           
                </table>
                
   
  


    </body>
    </html>