<?php 

require_once "connection.php";

$name = $email = $phno = $dob = $age ="";


if(isset($_POST['create']))
{
    //Validate Name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } else{
        $name = $input_name;
    }
    
    //Email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    }elseif(!filter_var($input_email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/")))){
        $email_err = "Please enter a valid email.";
    } else{
        $email = $input_email;
    }
    
    //phno
    $input_phno = trim($_POST["phno"]);
    if(empty($input_phno)){
        $phno_err = "Please enter an Ph No.";     
    } else{
        $phno = $input_phno;
    }
    
    $input_dob = trim($_POST["dob"]);
    if(empty($input_dob)){
        $dob_err = "Please enter a Date Of Birth.";     
    } else{
        $dob = $input_dob;
    }
    
    
    $input_age = trim($_POST["age"]);
    if(empty($input_age)){
        $age_err = "Please enter a Date Of Birth.";     
    } else{
        $age = $input_age;
    }
    
    if(empty($name_err) && empty($email_err) && empty($phno_err) && empty($dob_err) && empty($age_err) ){
        
        $sql = "INSERT INTO ecform(name,email,phno,dob,age) VALUES (?, ?, ?, ?, ?)";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_phno,$param_dob,$param_age);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_phno = $phno;
            $param_dob = $dob;
            $param_age = $age;  
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: elite_form.html");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        
    }
    
}




//if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
//  {
//        $secret = '6LfDbeIZAAAAAAPWrQizLcFZDSG-o3t1rXJxtwiZ';
//        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
//        $responseData = json_decode($verifyResponse);
//        if($responseData->success)
//        {
//            $succMsg = 'Your contact request have submitted successfully.';
//        }
//        else
//        {
//            $errMsg = 'Robot verification failed, please try again.';
//        }
//   }

?>