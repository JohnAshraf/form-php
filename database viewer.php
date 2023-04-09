<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'register_form';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// if(! $conn ) {
//     die('Could not connect: ' . mysqli_error($conn));
//  }
 
//  echo 'Connected successfully<br>';
?>

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
            flex-direction: column;
        }
    </style>
<body>
                <h1>User Details</h1>
                <a href="form.php" class="btn btn-success" style="    display: flex;
                align-self: flex-end;margin-right:10%">Add new user</a>
    
    <table style="width: 80%;" class="table table-striped">
        <thead style="text-align: center;">
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>recieve email</th>
        </thead>
        <tbody>
            <?php
                $new_query =  'SELECT * from user_data';
                mysqli_select_db($conn,$dbname);
                $result = mysqli_query( $conn,$new_query );
                                    
                if(! $result ) {
                        die('Could not get data: ' . mysqli_error($conn));
                    }

                if (mysqli_num_rows($result) > 0) {
                        
                        
                while($row = mysqli_fetch_assoc($result)){
                        echo"<tr style='text-align:center'>".
                            "<td>".$row['#']."</td>".
                            "<td>".$row['User_name']."</td>".
                            "<td>". $row['Email']."</td>".
                            "<td>". $row['Gender'] ."</td>".
                            "<td>". $row['Mail_Status'] ."</td>".
                                "</tr>";
                }
                } else {
                        echo "0 results";
                }
                echo "</table>";
                // echo "Fetched data successfully\n";
                mysqli_close($conn);
            ?>
        </tbody>
</body>

</html>
  
