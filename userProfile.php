<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank - Profile</title>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <?php
        // Navbar
        require_once("navbar.php");        
    ?>

    <div class="flex justify-center">
        <div class="container p-5 w-screen">
            <div class="md:flex justify-center no-wrap ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2 ">
                    <!-- Profile Card -->
                    <div class="bg-gray-100 p-3 border-t-4 border-red-600">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto" src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                                alt="">
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Jane Doe</h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">Donor / Reciver</h3>
                    </div>
                    <!-- End of profile card -->
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 bg-gray-100 border-t-4 border-red-600">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="p-3 shadow-sm rounded-sm">
                        <div class="flex items-center justify-between space-x-2 font-semibold text-gray-900 leading-8">
                            <div class="flex items-center">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide ml-1.5">About</span>
                            </div>
                            <button
                                class="middle none center rounded-lg bg-red-500 py-2 px-3 font-sans text-xs font-bold uppercase text-white shadow-md disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                data-ripple-light="true">
                                <a href="#">Update</a>
                            </button>
                        </div>
                        <div class="text-gray-700 my-2">
                            <div class="text-sm ">
                                <div class="grid grid-cols-2 break-words">
                                    <div class="px-4 py-2 font-semibold">Name</div>
                                    <div class="px-4 py-2">Jane Doe</div>
                                </div>
                                <div class="grid grid-cols-2 break-words">
                                    <div class="px-4 py-2 font-semibold">Email</div>
                                    <div class="px-4 py-2 ">JaneDoe132@gmail.com</div>
                                </div>

                                <div class="grid grid-cols-2 break-words">
                                    <div class="px-4 py-2 font-semibold">City</div>
                                    <div class="px-4 py-2">Ahmedabad</div>
                                </div>
                                <div class="grid grid-cols-2 break-words">
                                    <div class="px-4 py-2 font-semibold">State</div>
                                    <div class="px-4 py-2 ">Gujarat</div>
                                </div>
                                <div class="grid grid-cols-2 break-words">
                                    <div class="px-4 py-2 font-semibold">Country</div>
                                    <div class="px-4 py-2">India</div>
                                </div>
                                <div class="grid grid-cols-2 break-words">
                                    <div class="px-4 py-2 font-semibold">Contact No</div>
                                    <div class="px-4 py-2 ">9924062681</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of about section -->
                </div>
            </div>
        </div>
    </div>





</body>

</html>