
<?php

include 'conn.php';
extract($_POST);
extract($_GET);
if(isset($submit)){

    
    $query = "UPDATE ecform SET email='$email' WHERE id='$id' ";
 
    $result = mysqli_query($conn,$query);
    if($result == true)
    {
        echo "Record Inserted Successfully....";
    }
    else{
        echo "FAILED to Insert the Data...." ;

    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
   
     <title>Elite-Form</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <form method="post">
                
                <div class="card">
                    <div class="card-header bg-dark" >
                    <h1 class="text-center text-white">Edit User Email</h1>                    
                    </div>  

               

                <div class="form-group">
                    <label for="name">Enter Your New Email-ID</label>  
                    <input type="text" class="form-control" name="email"> 
                </div>

                

                <input type="submit" class="btn btn-success" name="submit" value="SUBMIT" >
                

                </div>

                </form>

                <h4> <a href="display.php"> <input type="button" class="btn btn-primary" value="View All Users"> </a> </h4>

            </div>
        </div>
    </div>
</body>
</html>