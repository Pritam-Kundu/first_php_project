<?php
$insert = false;            //After submitting the form a message will appear & the variable is defined for that
if(isset($_POST['name'])){      //When a name is given in the form only that time the php will run
    //Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    //Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for database connection
    if(!$con){
        die("Connection to the server failed due to " . mysqli_connect_error());
    }
    // echo "Successfully connected to DB";

    // Collect POST variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `nsec_travel_form`.`travel_form` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == TRUE){
        // echo "Successfully inserted";
        $insert = true;     //Flag for successful insertion
    }else{
        echo "Error : $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!-- ----------------------------------------------------------------------------------------------------------------------------->
<!-- HTML file starts here -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="nsec">
    <div class="container">
        <h1>Welcome to NSEC Travel Form</h1>
        <p>Enter your details here and submit for the confirmation</p>
        <?php
            if($insert == true){
                echo "<p class='submit'>Thanks for submitting the form. We will happy to meet you there</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="number" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <br>
            <button class="btn">Reset</button>
        </form>
    </div>
    <script src="index.js"></script>

    

</body>
</html>