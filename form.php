<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body{
            display: flex;
            height: 100%;
            background-color:#bce3a4;
            justify-content: center;
            align-items: center;
        }
       .form{
            padding: 20px;
            border-radius: 10px;
            background-color: white;
            width: 700px;
        }
    </style>
</head>
<body >
    <div class="form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
                <h1>USER REGISTRATION FORM</h1><hr>
                <p>Please fill the form and submit to add user record to the database.<p>
                <label>Name:</label><br>
                <input type="text" name="name"  style="width: 500px;height: 30px;margin-top: 5px;" required><br><br>
                <label >Email:</label><br>
                <input type="email" name="email" style="width: 500px;height: 30px;margin-top: 5px;" required><br><br>
                <label >Gender:</label><br>
                <input type="radio" name="gender" value="Male"  style="margin-top: 9px;" required> Male<br>
                <input type="radio" name="gender" value="Female"> Female<br><br>
                <input type="checkbox" name="checkbox"> Receive E-mails from us <br><br>
                <input type="submit" name="submit" class="btn btn-success" style="margin-right: 10px;">
                <input type="reset" name="Reset" class="btn btn-light">
                <?php
                    $dbhost = 'localhost';
                    $dbuser = 'root';
                    $dbpass = '';
                    $dbname = 'register_form';
                    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                    if(! $conn ) {
                        die('Could not connect: ' . mysqli_error($conn));
                    }
                    
                    // echo 'Connected successfully<br>';
               
                    $name = $email = $gender = "";
                    $mailstatus = false;
                    if(!empty($_POST['submit'])){
                        print_r($_POST);
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $gender = $_POST['gender'];
                    $mailstatus = isset($_POST['checkbox'])==1?"Yes":"No";
                    $register_form = "INSERT INTO user_data(User_name,Email,Gender,Mail_Status) 
                    VALUES ('$name','$email','$gender','$mailstatus')";
                     mysqli_query( $conn,$register_form );
                     header("Location: database viewer.php");
                    }
                    mysqli_close($conn);
                    ?>

            </form>
    </div>
</body>
</html>
