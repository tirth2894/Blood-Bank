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

        if (isset($_REQUEST["Id"])) {
            $id = base64_decode($_REQUEST["Id"]);

            $sql = "DELETE FROM user WHERE Id = $id";
            if(mysqli_query($connection,$sql))
            {
                header("Location: adminDashboard.php");
            }
        }
    ?>

    <!-- component -->
    <div x-data="setup()">
        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white text-black">

            <!-- Sidebar -->
            <div
                class="fixed flex flex-col h-full w-14 hover:w-60 md:w-60 bg-red-600 text-white transition-all duration-300 border-none z-10 sidebar">
                <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                    <ul class="flex flex-col py-4 space-y-1">
                        <li class="px-5 hidden md:block">
                            <div class="flex flex-row items-center h-8">
                                <div class="text-sm font-bold tracking-wide text-white uppercase">Admin Dashboard</div>
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
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-red-700 focus:bg-red-500 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-red-300 focus:border-red-300 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Navigation / Building_04"> <path id="Vector" d="M2 20H4M4 20H14M4 20V6.2002C4 5.08009 4 4.51962 4.21799 4.0918C4.40973 3.71547 4.71547 3.40973 5.0918 3.21799C5.51962 3 6.08009 3 7.2002 3H10.8002C11.9203 3 12.4796 3 12.9074 3.21799C13.2837 3.40973 13.5905 3.71547 13.7822 4.0918C14 4.5192 14 5.07899 14 6.19691V12M14 20H20M14 20V12M20 20H22M20 20V12C20 11.0681 19.9999 10.6024 19.8477 10.2349C19.6447 9.74481 19.2557 9.35523 18.7656 9.15224C18.3981 9 17.9316 9 16.9997 9C16.0679 9 15.6019 9 15.2344 9.15224C14.7443 9.35523 14.3552 9.74481 14.1522 10.2349C14 10.6024 14 11.0681 14 12M7 10H11M7 7H11" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Blood Banks</span>
                            </a>
                        </li>
                        <li>
                            <a href="#Contributor"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-red-500 focus:bg-red-500 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-red-300 focus:border-red-300 pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        class="stroke-current text-red-600  transform transition-transform duration-500 ease-in-out">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Contributors</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="h-full ml-14 mb-10 md:ml-60">
                <div class="grid grid-cols-1 sm:grid-cols-2 p-4 gap-2">
                    <div
                        class="bg-red-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-red-700 text-white font-medium group">
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
                                    $totalContributors = $row["count(*)"];
                                    echo $totalContributors;
                                ?>

                            </p>
                            <p>Contributors</p>
                        </div>
                    </div>
                    <div
                        class="bg-red-500 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-red-700 text-white font-medium group">
                        <div
                            class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Navigation / Building_04"> <path id="Vector" d="M2 20H4M4 20H14M4 20V6.2002C4 5.08009 4 4.51962 4.21799 4.0918C4.40973 3.71547 4.71547 3.40973 5.0918 3.21799C5.51962 3 6.08009 3 7.2002 3H10.8002C11.9203 3 12.4796 3 12.9074 3.21799C13.2837 3.40973 13.5905 3.71547 13.7822 4.0918C14 4.5192 14 5.07899 14 6.19691V12M14 20H20M14 20V12M20 20H22M20 20V12C20 11.0681 19.9999 10.6024 19.8477 10.2349C19.6447 9.74481 19.2557 9.35523 18.7656 9.15224C18.3981 9 17.9316 9 16.9997 9C16.0679 9 15.6019 9 15.2344 9.15224C14.7443 9.35523 14.3552 9.74481 14.1522 10.2349C14 10.6024 14 11.0681 14 12M7 10H11M7 7H11" stroke="#ef1c1c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl">
                                <?php
                                    $sql = "SELECT count(*) FROM user WHERE Role = 'BLOOD BANK'";
                                    $result = mysqli_query($connection,$sql);

                                    $row = mysqli_fetch_assoc($result);

                                    $totalBloodBank = $row["count(*)"];
                                    echo $totalBloodBank;
                                ?>
                            </p>
                            <p>Blood Banks</p>
                        </div>
                    </div>
                </div>


                <!-- Contributors -->
                <div class="mt-4 mx-4">
                    <h2 id="Contributor" class="font-semibold my-5 text-secondary-dark text-red-600 text-xl">
                        Contributors</h2>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50  ">
                                        <th class="px-4 py-3">Name</th>
                                        <th class="px-4 py-3">Email</th>
                                        <th class="px-4 py-3">Date - Time</th>
                                        <th class="px-4 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 ">

                                    <?php
                                        $limit = 5;
                                        if(isset($_REQUEST["contributorPage"]))
                                        {
                                            $start = $_REQUEST["contributorPage"] * $limit;
                                            $start -= $limit;
                                        }
                                        else{
                                            $start = 0;
                                        }
                                        $sql = "SELECT * FROM user WHERE Role = 'CONTRIBUTOR' ORDER BY Name LIMIT $start,$limit";
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
                                                    <a href="adminDashboard.php?Id='.base64_encode($row["Id"]).'">Delete</a>
                                                </button>
                                            </td>
                                        </tr>';
                                        }

                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- component -->
                        <div class="flex justify-end mr-3 mt-2">
                            <nav aria-label="Page navigation example">
                                
                                <ul class="flex list-style-none">
                                    <?php
                                        $n = ceil($totalContributors/$limit);
                                        for ($i=1; $i <= $n; $i++) { 
                                            echo '<li class="page-item"><a
                                            class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"
                                            href="adminDashboard.php?contributorPage='.$i.'">'.$i.'</a></li>';
                                        }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- BLOOD BANKS -->
                <div class="mt-4 mx-4">
                    <h2 id="BloodBank" class="font-semibold my-5 text-secondary-dark text-red-600 text-xl">Blood Banks
                    </h2>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr 
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50  ">
                                        <th class="px-4 py-3">Name</th>
                                        <th class="px-4 py-3">Email</th>
                                        <th class="px-4 py-3">Contact no</th>
                                        <th class="px-4 py-3">Location</th>
                                        <th class="px-4 py-3">Date - Time</th>
                                        <th class="px-4 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 ">

                                    <?php
                                    if(isset($_REQUEST["bloodBankPage"]))
                                    {
                                        $start = $_REQUEST["bloodBankPage"] * $limit;
                                        $start -= $limit;
                                    }
                                    else{
                                        $start = 0;
                                    }
                                    $sql = "SELECT * FROM user,banks WHERE user.Id = banks.Id AND user.Role = 'BLOOD BANK' ORDER BY Name LIMIT $start,$limit";
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
                                        <td class="px-4 py-3 text-sm">'.$row["Contact_No"].'</td>
                                        <td class="px-4 py-3 text-sm">'.ucfirst($row["City"]).', '.ucfirst($row["State"]).', '.ucfirst($row["Country"]).'</td>
                                        <td class="px-4 py-3 text-sm">'.$row["Timestamp"].'</td>
                                        <td class="px-4 py-3 text-xs">
                                            <button
                                                class="rounded-lg bg-red-500 w-20 my-0.5 text-center focus:bg-red-600 hover:bg-red-600 py-2 font-sans text-sm font-bold text-white "
                                                data-ripple-light="true">
                                                <a href="adminDashboard.php?Id='.base64_encode($row["Id"]).'">Delete</a>
                                            </button>
                                        </td>
                                </tr>';

                                    }
                                ?>



                                </tbody>
                            </table>
                        </div>
                        <div class="flex justify-end mr-3 mt-2">
                            <nav aria-label="Page navigation example">
                                <ul class="flex list-style-none">

                                    <?php
                                        $n = ceil($totalBloodBank/$limit) ;
                                        for ($i=1; $i <= $n; $i++) { 
                                            echo '<li class="page-item"><a
                                            class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"
                                            href="adminDashboard.php?bloodBankPage='.$i.'">'.$i.'</a></li>';
                                        }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>