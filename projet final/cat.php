
<?php 

session_start();


include("src/db.php");
if(!isset($_SESSION['valid'])){
 header("Location: index.php");
}


$id = $_SESSION['id'];


    $queryy = "select * from category 
    where userid = $id ";
    $result = mysqli_query($conn,$queryy);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
    background: #b6b6b6;
    color:  #23232e;
    
}
h1{
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 1rem;
    text-align: center;
    font-size: 40px;
    letter-spacing: 0.3ch;
    
    width: 100%;
}
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
a{  letter-spacing: 0.3ch;
    text-decoration: none;
    font-weight: bold; color:  #23232e;
    width: 100%;
    font-size: 20px;
}
    </style>
</head>

<body>
    <a href="home.php?category_id=0"><-- Back home</a>
<h1>all categorys</h1>
              
                <table class="content-table">
    
    
    
<thead>
                    <tr >
                        <th> NAME </th>
                        <th> DESCRIPTION </th>
                        
                        <th> EDIT  </th>
                        <th> DELETE </th>
                    </tr>
                    </thead>
                    <?php 
                            
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $idcat = $row['IDCAT'];
                                $Name= $row['nameC'];
                                $description = $row['descriptionC'];
                               
                    ?>
                            <tr>
                                <td><?php echo $Name ?></td>
                                <td><?php echo $description ?></td>
                                
                                <td><a href="editcat.php?cat_id=<?php echo $idcat; ?>" class="edit">Edit</a></td>
                                <td><a href="deletecat.php?deleteid=<?php echo $idcat; ?> "class="delete">Delete</a></td>

                            </tr>        
                    <?php 
                            }  
                    ?>                                                                    
                           
                </table>
</body>
</html>