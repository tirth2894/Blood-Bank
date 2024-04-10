<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank - Details</title>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <div class="bg-gray-100 flex justify-center items-center">
        <!-- Left: Image -->
        <div class="w-1/2 hidden lg:block h-screen fixed top-0 left-0">
            <img src="images/background.png" alt="Placeholder Image" class="object-center w-full h-full">
        </div>
        <!-- Right: Login Form -->
        <div class="sticky left-[50%] lg:px-36 md:px-52 sm:px-20 p-8 w-full lg:w-1/2 h-full">
            <h1 class="text-2xl font-semibold text-red-600">Details</h1>
            <form action="#" method="POST">
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="userName" class="block text-gray-600">Name</label>
                    <input type="text" id="userName" name="userName"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>
                <!-- Email Input -->
                <div class="mb-4">
                    <label for="userEmail" class="block text-gray-600">Email</label>
                    <input type="email" id="userEmail" name="userEmail"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- City Input -->
                <div class="mb-4">
                    <label for="userCity" class="block text-gray-600">City</label>
                    <input type="text" id="userCity" name="userCity"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- State Input -->
                <div class="mb-4">
                    <label for="userState" class="block text-gray-600">State</label>
                    <input type="text" id="userState" name="userState"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- Country Input -->
                <div class="mb-4">
                    <label for="userCountry" class="block text-gray-600">Country</label>
                    <input type="text" id="userCountry" name="userCountry"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- Contact Input -->
                <div class="mb-4">
                    <label for="userContact" class="block text-gray-600">Contact No</label>
                    <input type="number" id="userContact" name="userContact"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- A_positive Input -->
                <div class="mb-4">
                    <label for="A+" class="block text-gray-600">Quantity of A+ Blood</label>
                    <input type="number" id="A+" name="A+"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- A_nagative Input -->
                <div class="mb-4">
                    <label for="A-" class="block text-gray-600">Quantity of A- Blood</label>
                    <input type="number" id="A-" name="A-"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- B_positive Input -->
                <div class="mb-4">
                    <label for="B+" class="block text-gray-600">Quantity of B+ Blood</label>
                    <input type="number" id="B+" name="B+"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- B_nagative Input -->
                <div class="mb-4">
                    <label for="B-" class="block text-gray-600">Quantity of B- Blood</label>
                    <input type="number" id="B-" name="B-"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- O_positive Input -->
                <div class="mb-4">
                    <label for="O+" class="block text-gray-600">Quantity of O+ Blood</label>
                    <input type="number" id="O+" name="O+"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- O_nagative Input -->
                <div class="mb-4">
                    <label for="O-" class="block text-gray-600">Quantity of O- Blood</label>
                    <input type="number" id="O-" name="O-"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- AB_positive Input -->
                <div class="mb-4">
                    <label for="AB+" class="block text-gray-600">Quantity of AB+ Blood</label>
                    <input type="number" id="AB+" name="AB+"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- AB_nagative Input -->
                <div class="mb-4">
                    <label for="AB-" class="block text-gray-600">Quantity of AB- Blood</label>
                    <input type="number" id="AB-" name="AB-"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-600"
                        autocomplete="off">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-md py-2 px-4 w-full">Submit</button>
            </form>

        </div>
    </div>
</body>

</html>