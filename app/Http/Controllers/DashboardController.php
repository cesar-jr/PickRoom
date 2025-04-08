<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $votes_count = Vote::whereBelongsTo($request->user())->count();
        return view('dashboard', [
            'votes_count' => $votes_count,
        ]);
    }
}
