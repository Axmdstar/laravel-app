<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class quizcontroller extends Controller
{
    public function index()
    {
        $quizzes = quiz::all();

        return response()->json([
            'status' => 'success',
            'data' => $quizzes,
        ]);
    }

    public function get_all_quizzes_and_category()
    {
        // code...
        $quizzes = quiz::with('category')->get();

        return response()->json([
            'status' => 'success',
            'data' => $quizzes,
        ]);
    }

    public function show($id)
    {
        $quiz = quiz::find($id);
        if (! $quiz) {
            return response()->json([
                'status' => 'error',
                'message' => 'Quiz not found',
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'data' => $quiz,
            ]);
        }
    }

    public function create(Request $request)
    {
        try {
            // echo 'Creating quiz...';
            // echo $request;

            $request->validate([
                'question' => 'required|string',
                'category_id' => 'required|integer',
                'option_a' => 'required|string',
                'option_b' => 'required|string',
                'option_c' => 'required|string',
                'option_d' => 'required|string',
                'correct_option' => 'required|in:option_a,option_b,option_c,option_d',
            ]);

            $quiz = quiz::create([
                'question' => $request->question,
                'option_a' => $request->option_a,
                'option_b' => $request->option_b,
                'option_c' => $request->option_c,
                'option_d' => $request->option_d,
                'correct_option' => $request->correct_option,
                'category_id' => $request->category_id,
            ]);

            return response()->json([
                'status' => 'success',
                'data' => $quiz,
            ], 201);
        } catch (ValidationException $e) {
            \Illuminate\Support\Facades\Log::error('Validation error: ', $e->errors());

            return response()->json([
                'status' => 'error',
                'message' => $e->errors(),
            ], 500);
        }
    }
    //
}
