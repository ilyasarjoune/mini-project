<?php

require_once 'src/db.php';

if (isset($_POST['submit'])) {
    $name =  $_POST['nom'];
    $prenom =  $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $verify_query = mysqli_query($conn,"SELECT emailU FROM users WHERE emailU='$email'");
    if(mysqli_num_rows($verify_query) !=0 ){
        echo "<script>alert('this email is used!!'); </script>";
        header("Refresh: 0; url=signin.php");
     }
     else{
    // SQL query to insert data into the database
    $sql = "INSERT INTO users (`IDuser`, `nomU`, `prenomU`, `emailU`, `motpass`) VALUES (null, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ssss", $name, $prenom, $email, $password); // 's' for string, 'i' for integer
        mysqli_stmt_execute($stmt);

        // Check if the data was successfully inserted
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Get the ID of the newly inserted user
            

            // Redirect to tasks.php page with the ID of the new user in the query string
            header("Location: index.php");
            exit();
        } else {
            echo "Error: Unable to insert data.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Unable to prepare statement.";
    }}
}

?>


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        .message{
    text-align: center;
    background: #f9eded;
    padding: 15px 0px;
    border:1px solid #699053;
    border-radius: 5px;
    margin-bottom: 10px;
    color: red;
}
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: black;
}
.background{
    width: 430px;
    height: 650px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
 
form{
    height: 570px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 30px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 10px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 20px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.signin{
    background-color:#080710 ;
    color: #ffffff;
}
.social{
  margin-top: 10px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" >
        <h3>Sign in</h3>

        <label for="nom">Nom</label>
        <input type="text" placeholder="votre nom!" id="username" name="nom"required>
        
        <label for="prenom">Prenom</label>
        <input type="text" placeholder="votre prenom!" id="username" name="prenom"required>

        <label for="email">E-mail</label>
        <input type="email" placeholder="votre email!" id="username" name="email"required>

        <label for="pwd">Mote de passe</label>
        <input type="password" placeholder="Password" id="password" name="pwd" required>

        <button type="submit" name="submit">SUBMIT</button>
        <div class="links">
                    Already a member? <a style="color:yellow;" href="index.php">logIn</a>
                </div>
        
    </form>
</body>
</html>
