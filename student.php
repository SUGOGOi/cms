<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design/css/style.css">
    <title>Document</title>
</head>

<body>
    <nav class="relative flex items-center justify-between bg-indigo-500 py-2">
        <div class="container mx-auto flex flex-wrap items-center justify-between px-4">
            <div class="relative flex w-full justify-between sm:static sm:w-auto sm:justify-start">
                <img class="h-16 w-16" src="design/img/logo.png" alt="logo" />
                <p class="inline-block whitespace-nowrap py-1 text-3xl font-bold uppercase leading-relaxed text-white">COURSE MANAGEMENT SYSTEM</p>
            </div>
            <div class="flex-grow items-center sm:flex" id="example-navbar-warning">
                <ul class="ml-auto flex list-none flex-col lg:flex-row">
                    <li class="nav-item">
                        <a class="flex items-center px-2 py-2 text-xs font-bold uppercase leading-snug text-white hover:opacity-75" href=""> LOG OUT </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="relative mx-10 mt-10 overflow-x-auto shadow-md">
        <table class="w-full  text-sm">
            <thead class="bg-gray-700 text-xs uppercase text-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">S_ID</th>
                    <th scope="col" class="py-3 px-6">Fname</th>
                    <th scope="col" class="py-3 px-6">Lname</th>
                    <th scope="col" class="py-3 px-6">Photo</th>
                    <th scope="col" class="py-3 px-6">Ph_no</th>
                    <th scope="col" class="py-3 px-6">address</th>
                    <th scope="col" class="py-3 px-6">email</th>
                    <th scope="col" class="py-3 px-6">C_ID</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b bg-white">
                    <th scope="row" class="whitespace-nowrap py-4 px-6 font-medium text-gray-900">012</th>
                    <td class="py-4 px-6">Sumsum</td>
                    <td class="py-4 px-6">Gogoi</td>
                    <td class="py-4 px-6">.jpg</td>
                    <td class="py-4 px-6">+917577092187</td>
                    <td class="py-4 px-6">Sivsagar</td>
                    <td class="py-4 px-6">sum@gmail.com</td>
                    <td class="py-4 px-6">C01</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>