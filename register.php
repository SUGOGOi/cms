<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design/css/style.css">
    <title>Register</title>
</head>

<body class="bg-cover bg-center" style="background-image: url(design/img/grid.jpg)">
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
         include 'php/dbconnect.php';   
        $name= $_POST['name'];
        $password= $_POST['password'];
        $cpassword= $_POST['cpassword'];
        $exists= false;

            $existsql= "SELECT * FROM `users` WHERE name='$name'";
            $result= mysqli_query($conn,$existsql);
            $numExistRow= mysqli_num_rows($result);
            if($numExistRow >0){
                $exists= true;
                echo '<script>alert("Error! Username already exist ")</script>';
            }
               
            else if($password == $cpassword && $exists==false)
            {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql= "INSERT INTO `users` ( `name`, `password`, `dt`) VALUES ( '$name', '$hash', current_timestamp())";
            $result = mysqli_query($conn,$sql);
                if($result){
                        header("location:login.php");
                    }
            } 
            else{
                echo '<script>alert("Error! password do not match ")</script>';
             
            }            
          }

        
        ?>
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden py-6 sm:py-12">
        <div class="relative bg-white px-6 pt-10 pb-8 shadow-2xl sm:mx-auto  sm:rounded-lg ">
            <div class="mx-auto max-w-md">
                <div class="px-4 my-2 text-base leading-7 text-gray-800 antialiased">

                    <h1 class="text-center font-medium text-indigo-400 mb-4">COACHING MANGEMENT SYSTEM</h1>
                    <h1 class="text-center text-3xl pb-3 font-extralight">REGISTER</h1>

                    <div class="w-96 my-7 mx-auto h-1 rounded-md bg-sky-200"></div>
                    <form action = "/cms/register.php" method="POST" class="space-y-4" method="POST">

                        <label for="name" class="block w-96 mx-auto font-semibold">Username
                            <input type="text" required name="name" id="name" placeholder="Username" class="w-96 mx-auto px-3 py-1 border focus:outline-none focus:ring rounded-md flex items-center">
                        </label>

                        <label for="password" class="block w-96 mx-auto font-semibold">Password
                            <input type="password" required name="password" id="password" placeholder="Password" class="w-96 mx-auto px-3 py-1 border focus:outline-none focus:ring rounded-md flex items-center">
                        </label>

                        <label for="cpassword" class="block w-96 mx-auto font-semibold">Confirm Password
                            <input type="password" required name="cpassword" id="cpassword" placeholder="Confirm Password" class="w-96 mx-auto px-3 py-1 border focus:outline-none focus:ring rounded-md flex items-center">
                        </label>

                        <input type="submit" value="Register" class="w-96 mx-auto bg-indigo-500 rounded-md text-white items-center hover:bg-indigo-700 hover:shadow-md ">

                    </form>

                    <div class="w-96 my-7 mx-auto h-1 rounded-md bg-sky-200"></div>

                </div>
                <div class=" text-base font-semibold leading-7 mx-auto w-96">
                    <p class="text-gray-800">Already Registered?</p>

                    <a href="login.php">
                        <p class="text-indigo-500 hover:text-indigo-600">Login</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>