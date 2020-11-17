
<?php

include 'conn.php';
extract($_POST);
if(isset($submit)){

    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
 {
       $secret = '6LfDbeIZAAAAAAPWrQizLcFZDSG-o3t1rXJxtwiZ';
       $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
       $responseData = json_decode($verifyResponse);
       if($responseData->success)
       {
           $succMsg = 'Your contact request have submitted successfully.';
           echo $succMsg;
       }
       else
       {
           $errMsg = 'Robot verification failed, please try again.';
           echo $errMsg;
       }
  }

//   $dateOfBirth = $dob;
//   $today = date("Y-m-d");
//   $diff = date_diff(date_create($dateOfBirth), date_create($today));
//  // echo 'Age is '.$diff->format('%y');
    
    $query = "INSERT INTO ecform(name,email,phno,dob,age) VALUES('$name','$email','$phno','$dob','$age')";
 
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Elite-Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

     

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <form method="post" id="captcha" class="border-right-0">
                
                <div class="card">
                    <div class="card-header bg-dark" >
                    <h1 class="text-center text-white">Insert User</h1>                    
                    </div>   

                <div class="form-group">     
                    <label for="name">Name</label>  
                    <input type="text" class="form-control" name="name"> 
                    
                </div> 

                <div class="form-group">
                    <label for="name">Email</label>  
                    <input type="text" class="form-control" name="email"> 
                   
                </div>

                <div class="form-group">
                    <label for="name">Phone No.</label>  
                    <input type="text" class="form-control" name="phno"> 
                    
                </div>

                <div class="form-group"> 
                    <label for="name">Date of Birth</label>  
                    <input type="text" class="form-control" name="dob" placeholder="YYYY-mm-dd">
                    
                </div> 

                <div class="form-group">
                    <label for="name">Age</label>  
                    <input type="text" class="form-control" name="age" >
                    
                </div>

                <div class="form-group" id="captcha">
                <div class="g-recaptcha" data-sitekey="6LfDbeIZAAAAALguExxTxyC8LW-QnE9jbKQSA3ID"></div>
                <span id="captcha_error" class="text-danger"></span>
                </div>

                <input type="submit" class="btn btn-success" name="submit" id="submit" value="SUBMIT" >
                

                </div>

                </form>

                <h4> <a href="display.php"> <input type="button" class="btn btn-primary" value="View All Users"> </a> </h4>

            </div>
        </div>
    </div>
</body>
</html>
