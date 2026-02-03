<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Creator</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-indigo-600 p-4 text-white shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between">
            <a href="{{ route('quizzes.index') }}" class="font-bold text-xl">QuizMaster</a>
            <div>
                <a href="{{ route('quizzes.index') }}" class="px-3">All Quizzes</a>
                <a href="{{ route('quizzes.create') }}" class="px-3">Create New</a>
            </div>
        </div>
    </nav>

    <main class="py-10">
        @yield('content')
    </main>
</body>
</html>
