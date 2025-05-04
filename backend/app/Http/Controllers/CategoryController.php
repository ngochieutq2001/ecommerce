<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    // List categories
    public function index()
    {
        $categories = Category::where('status', 'active')->whereNull('deleted_at')->get();

        return response()->json([
            'message' => 'Categories fetched successfully.',
            'data' => $categories
        ]);
    }

    // Create new category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = Category::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'status' => 'active',
        ]);

        return response()->json([
            'message' => 'Category created successfully.',
            'data' => $category
        ], 201);
    }

    // Show a category
    public function show($id)
    {
        $category = Category::where('id', $id)
            ->whereNull('deleted_at')
            ->first();

        if (!$category) {
            return response()->json([
                'message' => 'Category not found.'
            ], 404);
        }

        return response()->json([
            'data' => $category
        ]);
    }

    // Update a category
    public function update(Request $request, $id)
    {
        $category = Category::where('id', $id)
            ->whereNull('deleted_at')
            ->first();

        if (!$category) {
            return response()->json([
                'message' => 'Category not found.'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return response()->json([
            'message' => 'Category updated successfully.',
            'data' => $category
        ]);
    }

    // Delete (soft delete) a category
    public function destroy($id)
    {
        $category = Category::where('id', $id)
            ->whereNull('deleted_at')
            ->first();

        if (!$category) {
            return response()->json([
                'message' => 'Category not found or already deleted.'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully.'
        ]);
    }
}
