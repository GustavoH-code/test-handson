<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    
    public function indexCourses()
    {
        return response()->json(['message' => 'View Course']);
    }

    public function indexCategories()
    {
        return response()->json(['message' => 'View Categories']);
    }

    public function indexFiles()
    {
        return response()->json(['message' => 'View Files']);
    }
}
