<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank - Admin</title>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <?php
        require_once("connection.php");
    ?>

    <!-- component -->
    <div x-data="setup()">
        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white text-black">

            <!-- Sidebar -->
            <div class="fixed flex flex-col h-full w-14 hover:w-64 md:w-64 bg-red-600 text-white transition-all duration-300 border-none z-10 sidebar">
                <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                    <ul class="flex flex-col py-4 space-y-1">
                        <li class="px-5 hidden md:block">
                            <div class="flex flex-row items-center h-8">
                                <div class="text-sm font-bold tracking-wide text-white uppercase">Main</div>
                            </div>
                        </li>
                        <li>
                            <a href="#"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-red-500 focus:bg-red-500  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-red-300 focus:border-red-300 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="#BloodBank"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-red-500 focus:bg-red-500 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-red-300 focus:border-red-300 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                        </path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Blood Banks</span>
                            </a>
                        </li>
                        <li>
                            <a href="#Contributor"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-red-500 focus:bg-red-500 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-red-300 focus:border-red-300 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Contributors</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="h-full ml-14 mb-10 md:ml-64">
                <div class="grid grid-cols-1 sm:grid-cols-2 p-4 gap-2">
                    <div class="bg-red-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-red-700 text-white font-medium group">
                        <div
                            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="stroke-current text-red-600  transform transition-transform duration-500 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">
                                <?php
                                    $sql = "SELECT count(*) FROM user WHERE Role = 'CONTRIBUTOR'";
                                    $result = mysqli_query($connection,$sql);

                                    $row = mysqli_fetch_assoc($result);

                                    echo $row["count(*)"];
                                ?>

                            </p>
                            <p>Contributors</p>
                        </div>
                    </div>
                    <div class="bg-red-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-red-700 text-white font-medium group">
                        <div
                            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="stroke-current text-red-600  transform transition-transform duration-500 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">
                                <?php
                                    $sql = "SELECT count(*) FROM user WHERE Role = 'BLOOD BANK'";
                                    $result = mysqli_query($connection,$sql);

                                    $row = mysqli_fetch_assoc($result);

                                    echo $row["count(*)"];
                                ?>
                            </p>
                            <p>Blood Banks</p>
                        </div>
                    </div>
                </div>


                <!-- Contributors -->
                <div class="mt-4 mx-4">
                    <h2 id="Contributor" class="font-semibold my-5 text-secondary-dark text-red-600 text-xl">Contributors</h2>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50  ">
                                        <th class="px-4 py-3">Name</th>
                                        <th class="px-4 py-3">Email</th>
                                        <th class="px-4 py-3">Date - Time</th>
                                        <th class="px-4 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 ">
                        
                                    <?php
                                        $sql = "SELECT * FROM user WHERE Role = 'CONTRIBUTOR'";
                                        $result = mysqli_query($connection,$sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr class="bg-gray-50 hover:bg-gray-100 text-gray-700 ">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                            alt="" loading="lazy" />
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">'.ucfirst($row["Name"]).'</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">'.$row["Email"].'</td>
                                            <td class="px-4 py-3 text-sm">'.$row["Timestamp"].'</td>
                                            <td class="px-4 py-3 text-xs">
                                                <button
                                                    class="rounded-lg bg-red-500 w-20 my-0.5 text-center focus:bg-red-600 hover:bg-red-600 py-2 font-sans text-sm font-bold text-white "
                                                    data-ripple-light="true">
                                                    <a href="#">Delete</a>
                                                </button>
                                                <button
                                                    class="rounded-lg bg-red-500 w-20 my-0.5 text-center focus:bg-red-600 hover:bg-red-600 py-2 font-sans text-sm font-bold text-white "
                                                    data-ripple-light="true">
                                                    <a href="#">Update</a>
                                                </button>
                                            </td>
                                        </tr>';
                                        }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                         </div>
                </div>
                
                <!-- BLOOD BANKS -->
                <div class="mt-4 mx-4">
                    <h2 id="BloodBank" class="font-semibold my-5 text-secondary-dark text-red-600 text-xl">Blood Banks</h2>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50  ">
                                        <th class="px-4 py-3">Name</th>
                                        <th class="px-4 py-3">Location</th>
                                        <th class="px-4 py-3">Contact no</th>
                                        <th class="px-4 py-3">Date - Time</th>
                                        <th class="px-4 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 ">
                                    
                                <?php
                                    $sql = "SELECT * FROM user,banks WHERE user.Id = banks.Id AND user.Role = 'BLOOD BANK'";
                                    $result = mysqli_query($connection,$sql);
                                
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        echo '<tr class="bg-gray-50 hover:bg-gray-100 text-gray-700 ">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                        alt="" loading="lazy" />
                                                </div>
                                                <div>
                                                    <p class="font-semibold">'.ucfirst($row["Name"]).'</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm">'.ucfirst($row["City"]).', '.ucfirst($row["State"]).'</td>
                                        <td class="px-4 py-3 text-sm">'.$row["Contact_No"].'</td>
                                        <td class="px-4 py-3 text-sm">'.$row["Timestamp"].'</td>
                                        <td class="px-4 py-3 text-xs">
                                            <button
                                                class="rounded-lg bg-red-500 w-20 my-0.5 text-center focus:bg-red-600 hover:bg-red-600 py-2 font-sans text-sm font-bold text-white "
                                                data-ripple-light="true">
                                                <a href="#">Delete</a>
                                            </button>
                                            <button
                                                class="rounded-lg bg-red-500 w-20 my-0.5 text-center focus:bg-red-600 hover:bg-red-600 py-2 font-sans text-sm font-bold text-white "
                                                data-ripple-light="true">
                                                <a href="#">Update</a>
                                            </button>
                                        </td>
                                </tr>';

                                    }
                                ?>
                                        
                                
                                    
                                </tbody>
                            </table>
                        </div>
                         </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>