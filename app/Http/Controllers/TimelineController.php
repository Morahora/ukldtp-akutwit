<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $tweet = Tweet::query();

        if ($request->filled('search')){
            $tweet->where('content', 'like', '%' .$request->search. '%');
        }

        return view('timeline', [
            'tweets' => $tweet->latest('id')->get(),
        ]
        
        );
    }
}
