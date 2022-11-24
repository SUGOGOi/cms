<?php 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design/css/style.css">
    <title>Login</title>
</head>

<body class="bg-center bg-cover" style="background-image: url(design/img/grid.jpg)">
<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
         include 'php/dbconnect.php';     
        $name= $_POST['name'];
        $password= $_POST['password'];
        

        $sql = "select * from users where name ='$name'";
        $result = mysqli_query($conn,$sql);
        $num= mysqli_num_rows($result);
        if($num==1){
          while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password,$row['password'])){
              $login = true;
              session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $name;
                header("location: index.php");

            }
          }
        
          
        }
        else{
          echo '<script>alert("Error! Invalid username and password.")</script>';
        }     
      }
  ?>
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden py-6 sm:py-12">
        <div class="relative bg-white px-6 pt-10 pb-8 shadow-2xl sm:mx-auto  sm:rounded-lg ">
            <div class="mx-auto max-w-md">
                <div class="px-4 my-2 text-base leading-7 text-gray-800 antialiased">

                    <h1 class="text-center font-medium text-indigo-400 mb-4">COACHING MANGEMENT SYSTEM</h1>
                    <h1 class="text-center text-3xl pb-3 font-extralight">LOGIN</h1>

                    <div class="w-96 my-7 mx-auto h-1 rounded-md bg-sky-200"></div>
                    <form action = "/cms/login.php" method="POST" class="space-y-4" method="POST">

                        <label for="name" class="block w-96 mx-auto font-semibold">Username
                            <input type="text" required name="name" id="name" placeholder="Username" class="w-96 mx-auto px-3 py-1 border focus:outline-none focus:ring rounded-md flex items-center">
                        </label>

                        <label for="password" class="block w-96 mx-auto font-semibold">Password
                            <input type="password" required name="password" id="password" placeholder="Password" class="w-96 mx-auto px-3 py-1 border focus:outline-none focus:ring rounded-md flex items-center">
                        </label>

                        <input type="submit" value="Login" class="w-96 mx-auto bg-indigo-500 rounded-md text-white items-center hover:bg-indigo-700 hover:shadow-md ">

                    </form>

                    <div class="w-96 my-7 mx-auto h-1 rounded-md bg-sky-200"></div>

                </div>
                <div class=" text-base font-semibold leading-7 mx-auto w-96">
                    <p class="text-gray-800">Not Registered Yet?</p>

                    <a href="register.php">
                        <p class="text-indigo-500 hover:text-indigo-600">Register</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
