<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Create an Account</h2>
        <form action="process.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-600" for="name">Full Name</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-300"
                    placeholder="John Doe" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600" for="email">Email</label>
                <input type="email" class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-300"
                    placeholder="john@example.com" id="email" name="email" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-300"
                    placeholder="********" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Confirm Password</label>
                <input type="password" name="confirmpassword" class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-300"
                    placeholder="********" required>
            </div>
            <button type="submit"
                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-600">Register</button>
        </form>
        <p class="text-sm text-center text-gray-600">Already have an account? <a href="#"
                class="text-blue-500 hover:underline">Sign in</a></p>
    </div>
</body>

</html>