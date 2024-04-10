<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank - Inquiry</title>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <?php
        // Navbar
        require_once("navbar.php");        
    ?>

    <div class="bg-gray-100 flex justify-center items-center">
        <!-- Form -->
        <div class="sm:px-20 md:w-5/6 p-8 w-full lg:w-1/2">
            <h1 class="text-2xl font-semibold mb-4 text-red-600">Donate Blood</h1>
            <form action="#" method="POST">
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="bloodGroup" class="block text-gray-600">Blood Group</label>
                    <select id="bloodGroup" name="bloodGroup"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="city" class="block text-gray-600">City</label>
                    <input type="text" id="city" name="city"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="state" class="block text-gray-600">State</label>
                    <input type="text" id="state" name="state"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="country" class="block text-gray-600">Country</label>
                    <input type="text" id="country" name="country"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md py-2 px-4 w-full">Submit</button>
            </form>

        </div>
    </div>

    <!-- BLOOD BANKS -->
    <div class="flex flex-col justify-center items-center bg-gray-100">
        <h2 class="font-semibold mb-5 text-center text-secondary-dark text-red-600 text-2xl">Recommended Blood Banks</h2>
        <div class="w-full md:w-5/6 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full mb-10">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50  ">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">City</th>
                            <th class="px-4 py-3">State</th>
                            <th class="px-4 py-3">Contact no</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 ">
                        <tr class="bg-gray-50 hover:bg-gray-100 text-gray-700 ">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy" />
                                    </div>
                                    <div>
                                        <p class="font-semibold">Tirth Patel</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">Ahmedabad</td>
                            <td class="px-4 py-3 text-sm">Gujarat</td>
                            <td class="px-4 py-3 text-sm">9924062681</td>   
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
</body>

</html>