@extends('layouts.app') @section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Create New Quiz</h2>
            <p class="text-gray-500">Add a challenging question to your collection.</p>
        </div>

        <form action="{{ route('quizzes.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Question</label>
                <textarea name="question" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="e.g. What is the capital of France?"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach(['a', 'b', 'c', 'd'] as $letter)
                <div>
                    <label class="block text-sm font-medium text-gray-700">Option {{ strtoupper($letter) }}</label>
                    <input type="text" name="option_{{ $letter }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                @endforeach
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Correct Option</label>
                <select name="correct_option" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="option_a">Option A</option>
                    <option value="option_b">Option B</option>
                    <option value="option_c">Option C</option>
                    <option value="option_d">Option D</option>
                </select>
            </div>

            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save Quiz
            </button>
        </form>
    </div>
</div>
@endsection
