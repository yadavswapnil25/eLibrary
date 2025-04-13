<?php

namespace App\Http\Controllers\Api;

use App\Models\Booklet;
use Illuminate\Http\Request;
use App\Models\BookletQuestion;
use App\Http\Controllers\Controller;

class BookletController extends Controller
{
    public function getBooklet(Request $request)
    {
        // Fetch all booklets or filter based on query parameters
        $booklets = Booklet::all();

        // Include Year and Branch enums
        $years = array_column(\App\Enums\Years::cases(), 'value');
        $branches = array_column(\App\Enums\Branches::cases(), 'value');

        // Return the response as JSON
        return response()->json([
            'success' => true,
            'data' => [
                'booklets' => $booklets,
                'years' => $years,
                'branches' => $branches,
            ],
        ]);
    }

    public function getBookletQuestions($id)
    {
        // Fetch all booklet questions or filter based on query parameters
        $bookletQuestions = BookletQuestion::where('booklet_id', $id)->get();

        // Return the response as JSON
        return response()->json([
            'success' => true,
            'data' => $bookletQuestions,
        ]);
    }
}
