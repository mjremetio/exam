<?php
       include 'includes/db_connection.php';
       if (!isset($_SESSION['logged_in'])) {
        header("location: login.php");
      } 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head>

</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                    <a href="includes/logout.php">logout</a>
            </div>  
        </div>
        <h2 id="display_fullname"><?php echo $_SESSION['fullname'];?></h2>

    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  

</body>
</html>