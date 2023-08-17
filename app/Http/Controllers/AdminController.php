<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert; // Importing the Alert facade for displaying alerts
use App\Models\Category; // Importing the Category model

class AdminController extends Controller
{
    // Function to display categories
    function view_category(){
        $data = Category::all(); // Fetch all categories from the database
        return view('admin.category', compact('data')); // Display the 'admin.category' view with category data
    }

    // Function to add a new category
    function add_category(Request $request){
        $data = new Category; // Create a new Category model instance
        $data->category_name = $request->category; // Assign the category name from the request
        $data->save(); // Save the new category to the database
        Alert::success('Category Added Successfully', 'New Category Added'); // Show a success alert
        return redirect()->back(); // Redirect back to the previous page
    }

    // Function to delete a category
    function delete_category($id){
        $data = Category::find($id); // Find the category with the given ID
        $data->delete(); // Delete the category
        Alert::success('Category Deleted Successfully', 'Category Removed'); // Show a success alert
        return redirect()->back(); // Redirect back to the previous page
    }
}

