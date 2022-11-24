<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-+4j30LffJ4tgIMrq9CwHvn0NjEvmuDCOfk6Rpg2xg7zgOxWWtLtozDEEVvBPgHqE" crossorigin="anonymous">

    <title>Course Info</title>
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
        <h1 class="text-center text-white bg-dark"> Courses</h1>
        <br>
        <div class="table-responsive ">
            <table class ="table table-bordered table-striped table-hover text-center">
            <thead class="bg-dark text-white" >
                <th>Course Name</th>
                <th>CID</th>
                </thead>
                <tbody>
                <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            include 'php/dbconnect.php';
            $cid= $_POST['C_ID'];
            $cname= $_POST['Cname'];
            $exists= false;

            $existsql= "SELECT * FROM `course` WHERE cid='$cid' OR coursename='$cname'";
            $result= mysqli_query($conn,$existsql);
            $numExistRow= mysqli_num_rows($result);
            if($numExistRow >0){
                $exists= true;
                echo '<script>alert("Error! Course ID or course already exist ")</script>';
            }
            else if($exists==false){
            $sql= "INSERT INTO `course` ( `cid`, `coursename`) VALUES ('$cid','$cname')";
            $result = mysqli_query($conn,$sql);

            //display in table
            $displayquery = "select * from course";
            $qdisplay = mysqli_query($conn, $displayquery);

            while($result= mysqli_fetch_array($qdisplay)){
            ?>
            <tr>
            <td> <?php echo $result['coursename']?></td>
            <td> <?php echo $result['cid'] ?> </td>
            </tr>
            <?php
               
            }
            
        }
    }
        ?>

                        <?php
                            include 'php/dbconnect.php';
                            $displayquery = "select * from course";
                            $qdisplay = mysqli_query($conn, $displayquery);

                            while($result= mysqli_fetch_array($qdisplay)){


                        ?>
                        <tr>
                        <td> <?php echo $result['coursename']?></td>
                        <td> <?php echo $result['cid'] ?> </td>
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
       <strong> <a href="addcourse.php"> ADD COURSE </a></strong>
       <br><br>
       <strong> <a href="index.php"> DASHBOARD</a></strong>

    </div>

    </body>
    </html>
