<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <title>Elite-Form</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" >

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <table class="table">
                         <thead class="thead-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone NO.</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Age</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                            </tr>
                        </thead>

                        <?php 
                            include 'conn.php' ;
                            $query = "SELECT * FROM ECFORM" ;
                            $result = mysqli_query($conn,$query);

                            while($res = mysqli_fetch_array($result)){

                           
                        ?>

                         <tbody>
                            <tr>
                            <th scope="row"><?php echo $res['id'] ?></th>
                            <td><?php echo $res['name']?></td>
                            <td><?php echo $res['email']?></td>
                            <td><?php echo $res['phno']?></td>
                            <td><?php echo $res['dob']?></td>
                            <td><?php echo $res['age']?></td>
                            <td> <a href="delete.php?id=<?php echo $res['id']?>"> <input type="button" class="btn btn-primary" value="DELETE"> </a> </td>
                            <td> <a href="update.php?id=<?php echo $res['id']?>"> <input type="button" class="btn btn-primary" value="EDIT"> </a> </td>
                            </tr>
                        </tbody>

                        <?php  } ?>

                    </table>

            </div>
        </div>
    </div>
    

    
</body>
</html>