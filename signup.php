<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/foreigns.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php 

include 'includes/navbar-logSign.php';

require_once 'includes/database.php';
if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['phone'];
    $password = $_POST['password'];
    $data = [$name,$email,$tel,$password];
    $good = true;
    foreach($data as $input){
        if(empty($input)){
            $good = false;
            break;
        }
    }
     if($good){
        $user = $sqlState->prepare('INSERT INTO users VALUES(null,?,?,?,?)');
        $user->execute([$name,$email,$password,$tel]);
        header('Location:login.php');
     }
    }?>
<body>
    <div class="signUp">
        <div id='alert'></div>
            <form id="signupForm" method="post">
                <h1> Sign Up </h1>
                
                <fieldset>
                    
                    <legend><span class="number">1</span> Your Basic Info</legend>
                    <div class="inputs">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    
                    <label for="email">Email:</label>
                    <input type="email" id="mail" name="email">
                    <label for="phone">Phone Number: </label>
                    <input type="tel" id="phone" name="phone">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    <label for="cpassword">Confirm Password:</label>
                    <input type="password" id="cpassword" name="cpassword">
                    <label id='passLabel' class='text-danger'></label>
                    <input type="checkbox" name="terms" id="terms">Accept the <a href="terms.html">terms and conditions</a>
                    <label id='termsLabel' class='text-danger'></label>

                    </div>
                </fieldset>
                <button type="submit" name="signup" id="signup">Sign Up</button>
            </form>
    </div>
    <script src='js/sign.js'></script>
</body>
</html>
