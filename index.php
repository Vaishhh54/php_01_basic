<?php
$insert = false;

if(isset($_POST['name'])) {
    // Database connection parameters
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "php-1"; // Adjust database name if different
    
    // Establish connection to MySQL
    $con = mysqli_connect($server, $username, $password, $database);
    
    if(!$con) {
        die("Connection to database failed due to: " . mysqli_connect_error());
    }
    // SQL query for inserting data into 'trip' table
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Background Image">
    <div class="container">
        <h1>Welcome to RCPIT SHIRPUR</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        
        <?php
        if($insert) {
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the trip.</p>";
        }
        ?>
        
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="text" name="age" id="age" placeholder="Enter your Age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="text" name="phone" id="phone" placeholder="Enter your phone" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button type="submit" class="btn">Submit</button> 
        </form>
    </div>

    <?php
    // This part is for another table 'booking' - adjust as per your requirements
    if(isset($_POST['name'])) {
        $con = mysqli_connect($server, $username, $password, $database);
        
        if(!$con) {
            die("Connection to database failed due to: " . mysqli_connect_error());
        }

        // Capture form data
        $name = $_POST['name'];
        $gender = $_POST['gender']; // Corrected variable name
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $other = $_POST['desc']; // Adjusted variable name to match form input

        // SQL query for inserting data into 'booking' table
        $sql_booking = "INSERT INTO `booking` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dd`) 
                        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";

        if($con->query($sql_booking) == true) {
            // echo "Successfully inserted into booking table";
            
        } else {
            echo "ERROR: $sql_booking <br> $con->error";
        }

        $con->close();
    }
    ?>

    <script src="index.js"></script>
</body>
</html>
