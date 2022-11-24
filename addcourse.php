<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design/css/style.css">
    <title>Add Course</title>
</head>

<body class="bg-center bg-cover" style="background-image: url(design/img/grid.jpg)">
    
    <nav class="fixed top-0 left-0 right-0 flex items-center justify-between bg-indigo-500 py-2">
        <div class="container mx-auto flex flex-wrap items-center justify-between px-4">
            <div class="flex w-full justify-between sm:static sm:w-auto sm:justify-start">
                <img class="h-16 w-16" src="design/img/logo.png" alt="logo" />
                <p class="inline-block whitespace-nowrap py-1 text-3xl font-bold uppercase leading-relaxed text-white">COURSE MANAGEMENT SYSTEM</p>
            </div>
            <div class="flex-grow items-center sm:flex" id="example-navbar-warning">
                <ul class="ml-auto flex list-none flex-col lg:flex-row">
                    <li class="nav-item">
                        <a class="flex items-center px-2 py-2 text-xs font-bold uppercase leading-snug text-white hover:opacity-75" href="/cms/logout.php"> LOG OUT </a>
                    </li>

                    <li class="nav-item">
                        <a class="flex items-center px-2 py-2 text-xs font-bold uppercase leading-snug text-white hover:opacity-75" href="index.php"> Go Back </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden py-6">
        <div class="relative bg-gray-200 px-6 pt-10 pb-8 shadow-2xl sm:mx-auto sm:rounded-lg ">
            <div class="mx-auto max-w-md">
                <div class="px-4 text-base leading-7 text-gray-800 antialiased">

                    <h1 class="text-center font-medium text-indigo-400 mb-4">ADD COURSE</h1>

                    <form action = "/cms/uploadc.php" method="POST" class="space-y-4">

                        <label for="C_ID" class="block w-96 mx-auto font-semibold">Course ID
                            <input required type="text" name="C_ID" id="C_ID" placeholder="eg: C01" class="w-96 mx-auto px-3 py-1 border focus:outline-none focus:ring rounded-md flex items-center">
                        </label>

                        <label for="Cname" class="block w-96 mx-auto font-semibold">Course Name
                            <input required type="text" name="Cname" id="Cname" placeholder="eg: Web Technology" class="w-96 mx-auto px-3 py-1 border focus:outline-none focus:ring rounded-md flex items-center">
                        </label>

                        <input type="submit" value="SUBMIT" class="w-96 mx-auto bg-indigo-500 rounded-md text-white items-center hover:bg-indigo-700 hover:shadow-md ">

                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
