<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoteRequest;
use App\Http\Requests\UpdateVoteRequest;
use App\Models\Poll;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function redirectLogin()
    {
        redirect()->setIntendedUrl(url()->previous());
        return redirect(route('login'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Poll $poll)
    {
        $logged = Auth::check();
        $vote = $logged ? Vote::whereBelongsTo($request->user())->whereBelongsTo($poll)->first() : null;
        $data = [
            'logged' => $logged,
            'poll' => $poll,
            'disabled' => !$logged || $vote,
            'checked' => $vote?->options ?? [],
            'see_results' => Gate::allows('view', $poll)
        ];
        if (!$poll->active)
            abort(404);
        return view('poll.basic', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoteRequest $request, Poll $poll)
    {
        $validated = $request->validated();
        $vote = new Vote($validated);
        $vote->poll()->associate($poll);
        $vote->user()->associate($request->user());
        $vote->save();
        if (Gate::allows('view', $poll))
            return redirect(route("polls.show", ['poll' => $poll]));
        else
            return redirect(route("dashboard"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoteRequest $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
