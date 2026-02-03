<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    public function get_all_category()
    {
        // code...
        $categories = category::all();

        return response()->json([
            'status' => 'success',
            'data' => $categories,
        ]);
    }

    public function get_category_by_id($id)
    {
        $category = category::find($id);
        if (! $category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Category not found',
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'data' => $category,
            ]);
        }
    }

    public function create_category(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $category = category::create([
            'name' => $request->name,
            'is_active' => $request->is_active ?? true,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $category,
        ], 201);
    }

    public function seed_categories()
    {
        $categories = [
            ['name' => 'Science', 'is_active' => true],
            ['name' => 'History', 'is_active' => true],
            ['name' => 'Geography', 'is_active' => true],
            ['name' => 'Mathematics', 'is_active' => true],
            ['name' => 'Literature', 'is_active' => true],
        ];

        foreach ($categories as $categoryData) {
            category::create($categoryData);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Categories seeded successfully',
        ]);
    }
}
