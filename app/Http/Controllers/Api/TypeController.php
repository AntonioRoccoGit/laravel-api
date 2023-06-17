<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return response()->json([
            'response' => 'success',
            'results' => $types
        ]);
    }
}
