<?php
include_once 'includes/navbar-logSign.php';

$servername = "localhost";
$username = "root";
$password = "azerT123";
$dbname = "location_voitures";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['login'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; 
    // Ensure password is set
    
    if($password !== null){ 
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $dataPass = $user['password_'];

            // Verify the submitted password with the hashed password
            if($password==$dataPass){
                echo 'Connected successfully';
                header('Location:home.php');
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                Password Incorrect
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
            User Not Found
            </div><?php
        }
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
        All the Fields are Required!
        </div><?php
        echo 'Password field is required';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/foreigns.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Log In</title>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="container" id='containerlogin'></div>
            <form id="signupForm" method="post">
                <h1> Log In </h1>
                <fieldset>
                    <legend><span class="number">2</span> Enter Your Account</legend>
                    <label for="email">Email:</label>
                    <input type="email" id="mail" name="email"  value='username@gmail.com'>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"> 
                </fieldset>
                <div class="btns d-flex ">
                <button type="submit" name="login" class='mx-1' id="login">Log In</button>
                <a href='index.php' name="login" class='mx-1 btn btn-danger  text-center' id="login">Log Out</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>
