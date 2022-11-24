<?php
session_start();
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!= true){
    // echo '<script>alert("Error! Please Login ")</script>';
    header("location: login.php");
    exit;
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design/css/style.css">
    <title>Welcome</title>
</head>

<body>
    <?php
        include 'php/dbconnect.php';  

        $t = "select tid from teachers order by tid";
        $tdisplay = mysqli_query($conn, $t);
        $tnumExistRow= mysqli_num_rows($tdisplay);
    ?>
    <nav class="relative flex items-center justify-between py-2 bg-indigo-500">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between sm:w-auto sm:static sm:justify-start">
                <img class="h-16 w-16" src="design/img/logo.png" alt="logo">
                <p class="text-3xl font-bold leading-relaxed inline-block py-1 whitespace-nowrap uppercase text-white">
                    DASHBOARD
                </p>
            </div>
            <div class="sm:flex flex-grow items-center" id="example-navbar-warning">
                <ul class="flex flex-col lg:flex-row list-none ml-auto">
                    <li class="nav-item">
                        <a class="px-2 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="addcourse.php">
                            Add Course
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="px-2 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="addteacher.php">
                            Add Teacher
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="px-2 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="addstudent.php">
                            Add Student
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="flex items-center px-2 py-2 text-xs font-bold uppercase leading-snug text-white hover:opacity-75"  href="/cms/logout.php"> LogOut </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="flex">
        <div class="flex flex-wrap flex-row  w-2/5 h-screen bg-indigo-400">
            <div class="flex justify-center h-10 pt-2 w-auto mx-auto">
                <p class="px-2 py-1 flex flex-wrap text-xl leading-snug uppercase font-bold text-white text-center">Welcome <?php  echo $_SESSION['name']?></p>
                <img class="flex flex-wrap h-10 w-10" src="design/img/user.png" alt="user">
            </div>

            <div class="mx-auto pb-10 w-96 h-96">
                <a href="uploadt.php">
                <div class="text-center py-4 my-4 h-1/3 bg-indigo-600 hover:bg-indigo-500 rounded-3xl shadow-xl">
                    <p class="uppercase font-bold text-white">Teachers</p>
                    <div class="flex py-4 px-16">
                        
                        <p class="block font-light text-white">Total : <?php echo $tnumExistRow;?> </p>
                        <p class="ml-auto block font-light text-white">#</p>
                    </div>
                </div>
                </a>
                <a href="uploads.php">
                <div class="text-center py-4 my-4 h-1/3 bg-indigo-600 hover:bg-indigo-500 rounded-3xl shadow-xl">
                    <p class="uppercase font-bold text-white">Students</p>
                    <div class="flex py-4 px-16">
                        <?php
                        $s = "select sid from student order by sid";
                        $sdisplay = mysqli_query($conn, $s);
                        $snumExistRow= mysqli_num_rows($sdisplay);                
                        ?>
                        <p class="block font-light text-white">Total : <?php echo $snumExistRow;?></p>
                        <p class="ml-auto block font-light text-white">#</p>
                    </div>
                </div>
                </a>

                <a href="uploadc.php">
                <div class="text-center py-4 my-4 h-1/3 bg-indigo-600 hover:bg-indigo-500 rounded-3xl shadow-xl">
                    <p class="uppercase font-bold text-white">Courses</p>
                    <div class="flex py-4 px-16">
                        <?php
                        $c = "select cid from course order by cid";
                        $cdisplay = mysqli_query($conn, $c);
                        $cnumExistRow= mysqli_num_rows($cdisplay);
                
                        ?>
                        <p class="block font-light text-white">Total : <?php echo $cnumExistRow;?></p>
                        <p class="ml-auto block font-light text-white">#</p>
                    </div>
                </div>
                </a>
            </div>
        </div>

        <div class="flex flex-wrap w-3/5 h-screen bg-white">
            <img class="ml-16 h-screen" src="design/img/dashboard.jpg" alt="dash image">
        </div>
    </div>
</body>

</html>
