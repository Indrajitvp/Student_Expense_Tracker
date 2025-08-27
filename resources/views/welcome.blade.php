<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Expense Tracker</title>
    <link rel="icon" type="image/x-icon" href="https://play-lh.googleusercontent.com/dif6BNC4jh2EKHOw6gplsjoKy7F3Fv4avCiJGhglmzNlzv8fJQtqEtMA2T__rypQapY=w480-h960-rw">

    <!-- Tailwind CSS CDN for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom font for a clean, modern look */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-[#0e0e2e] text-white flex items-center justify-center min-h-screen p-4">

<!-- Main content card -->
<div class="bg-[#1b1b42] shadow-xl rounded-2xl p-8 max-w-xl w-full text-center">
    <!-- Title and description section -->
    <h1 class="text-4xl font-bold mb-2 tracking-tight">
        Welcome to Your
        <span class="text-lime-400">Expense Tracker</span>
    </h1>
    <p class="text-gray-400 text-lg mb-8">
        Manage your finances easily and keep track of your student expenses.
    </p>

    <!-- Call to action button -->
    <a href="{{ route('dashboard') }}" class="inline-block w-full py-4 text-white text-xl font-semibold bg-lime-600 rounded-lg shadow-md hover:bg-lime-700 transition-colors duration-300">
        Get Started
    </a>

    <!-- Additional links section -->
    <div class="mt-8 text-sm space-y-2">
        <p class="text-gray-400">
            Already have an account?
            <a href="{{ route('login') }}" class="text-lime-400 hover:underline">Log in here</a>.
        </p>
        <p class="text-gray-400">
            New to the tracker?
            <a href="{{ route('register') }}" class="text-lime-400 hover:underline">Register now</a>.
        </p>
    </div>
</div>

</body>
</html>
