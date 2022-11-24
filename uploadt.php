<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-+4j30LffJ4tgIMrq9CwHvn0NjEvmuDCOfk6Rpg2xg7zgOxWWtLtozDEEVvBPgHqE" crossorigin="anonymous">

    <title>Teachers Info</title>
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    -->
    <div class="container">
        <br>
        <h1 class="text-center text-white bg-dark"> Teachers Information</h1>
        <br>
        <div class="table-responsive ">
            <table class ="table table-bordered table-striped table-hover text-center">
            <thead class="bg-dark text-white" >
                <th>CID</th>
                <th>Email</th>
                <th>Address</th>
                <th>Ph No</th>
                <th>Photo</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>TID</th>
            </thead>
            <tbody>
                <?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    include 'php/dbconnect.php';
                    $tid= $_POST['T_ID'];
                    $fname= $_POST['Fname'];
                    $lname= $_POST['Lname'];
                    $img= $_FILES['photo'];
                    $Phno= $_POST['Phno'];
                    $address= $_POST['address'];
                    $email= $_POST['email'];
                    $cid= $_POST['CID'];
                    $cexists= false;
                    $texists= false;
        
                    $texistsql= "SELECT * FROM `teachers` WHERE tid='$tid'";
                    $tresult= mysqli_query($conn,$texistsql);
                    $tnumExistRow= mysqli_num_rows($tresult);
                    
                    if($tnumExistRow >0){
                        $texists=true;
                        echo '<script>alert("Teacher ID already exist")</script>';
                    }
                    else if($texists==false){
                        $imgname = $img['name'];
                        $imgerror = $img['error'];
                        $imgtmp = $img['tmp_name'];
        
                        $imgext = explode('.',$imgname);
                        $imgcheck = strtolower(end($imgext));
                        $imgextstored = array('png','jpg','jpeg');
        
                        if(in_array($imgcheck,$imgextstored)){
                            $destinationimg = 'uploadt/'.$imgname;
                            move_uploaded_file($imgtmp,$destinationimg);
        
                            $sql= "INSERT INTO `teachers` ( `tid`, `fname`,`lname`,`photo`,`phno`,`address`,`email`,`cid`) VALUES ('$tid','$fname','$lname','$destinationimg','$Phno','$address','$email','$cid')";
                            $result = mysqli_query($conn,$sql);
                            

                            $displayquery = "select * from teachers";
                            $qdisplay = mysqli_query($conn, $displayquery);

                            while($result= mysqli_fetch_array($qdisplay)){


                        ?>
                        <tr>
                            <td> <?php echo $result['cid']?></td>
                            <td> <?php echo $result['email'] ?> </td>
                            <td> <?php echo $result['address']?> </td>
                            <td> <?php echo $result['phno'] ?></td>
                            <td> <img src=" <?php echo $result['photo'] ?>" height="100px" width="100px"></td>
                            <td> <?php echo $result['lname']?></td>
                            <td> <?php echo $result['fname']?> </td>
                            <td> <?php echo $result['tid'] ?> </td>
                        </tr>


                        <?php
                       } 
                        
        
                        }
                        else{
                            echo '<script>alert("Upload image format png, jpg and jpeg!")</script>';
                        }
        
                        
                         
                    }
                                    
                }
                ?>
                <?php
                            include 'php/dbconnect.php';
                            $displayquery = "select * from teachers";
                            $qdisplay = mysqli_query($conn, $displayquery);

                            while($result= mysqli_fetch_array($qdisplay)){


                        ?>
                        <tr>
                            <td> <?php echo $result['cid']?></td>
                            <td> <?php echo $result['email'] ?> </td>
                            <td> <?php echo $result['address']?> </td>
                            <td> <?php echo $result['phno'] ?></td>
                            <td> <img src=" <?php echo $result['photo'] ?>" height="100px" width="100px"></td>
                            <td> <?php echo $result['lname']?></td>
                            <td> <?php echo $result['fname']?> </td>
                            <td> <?php echo $result['tid'] ?> </td>
                        </tr>


                        <?php
                       } 
                       ?>
            </tbody>
            </table>
        </div>
    </div>
    <div class="container text-center">
    <strong><a href="/cms/logout.php"> LOG OUT </a></strong>
      <br><br>
       <strong> <a href="addteacher.php"> ADD TEACHER </a></strong>
       <br><br>
       <strong> <a href="index.php"> DASHBOARD</a></strong>

    </div>
  </body>
</html>
