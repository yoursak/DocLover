<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden - CraftMyDoc</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Optional: You can customize Tailwind theme colors here if needed
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Example: Add a brand color if you have one
                        // brand: '#FF5733',
                    }
                }
            }
        }
    </script>
    <style>
        /* Optional: Add custom base styles or fonts here */
        /* @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap'); */
        body {
            /* font-family: 'Inter', sans-serif; */
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-xl p-8 md:p-12 max-w-lg mx-auto text-center">

            <div class="mb-6 text-xl font-semibold text-indigo-600">
                <span><span style="color: black">Craft</span>MyDoc</span>
            </div>

            <h1 class="text-8xl md:text-9xl font-bold text-red-600 mb-2">
                403
            </h1>

            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-4">
                Access Denied / Forbidden
            </h2>

            <p class="text-gray-600 mb-8 text-base md:text-lg">
                Sorry, you do not have the necessary permissions to access this page or resource. Authentication will not grant access. If you believe this is an error, please contact support or an administrator.
            </p>

            <div class="mt-8 flex flex-col sm:flex-row sm:justify-center sm:space-x-4 space-y-4 sm:space-y-0">
                <a href="/" class="inline-block px-6 py-3 bg-indigo-600 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg transition duration-150 ease-in-out">
                    Go Back to Homepage
                </a>

                <a href="/contact" class="inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                    Contact Support
                </a>
            </div>

        </div>
    </div>

</body>
</html>
