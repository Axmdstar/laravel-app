@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manage Quizzes</h1>
        <a href="{{ route('quizzes.create') }}" class="bg-green-500 text-white px-4 py-2 rounded shadow">Add Quiz</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Question</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Correct</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($quizzes as $quiz)
                <tr>
                    <td class="px-6 py-4">{{ $quiz->question }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">
                            {{ $quiz->category->name ?? 'None' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 font-mono text-green-600 font-bold uppercase">
                        {{ str_replace('option_', '', $quiz->correct_option) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
