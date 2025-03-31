<?php

namespace App\Http\Controllers;

use App\Enums\AnswerType;
use App\Http\Requests\StorePollRequest;
use App\Http\Requests\UpdatePollRequest;
use App\Models\Poll;
use App\Models\Option;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('poll.list');
    }

    public function list(Request $request)
    {
        $data = $request->validate([
            'search' => [ //verificar melhor esse search, maiusculas e minusculas e talvez fazer o role do espaço
                'string',
                'max:255',
            ]
        ]);
        $records = Poll::whereBelongsTo($request->user())->withCount('votes')
            ->where(function (Builder $query) use ($data) {
                if ($data['search'] ?? null) {
                    $query->where('question', 'ilike', '%' . $data['search'] . '%');
                }
            })
            ->paginate(10)->withQueryString();
        return $records;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('poll.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePollRequest $request)
    {
        // DB::enableQueryLog();
        $validated = $request->validated();
        $poll = new Poll([
            'question' => $validated['question'],
            'details' => $validated['details'],
            'answer_type' => $validated['answerType'],
        ]);
        $options = [];
        foreach ($validated['answer'] as $index => $value) {
            $options[] = new Option([
                'answer' => $value,
                'extra' => $validated['additional'][$index] ?? null,
            ]);
        }
        DB::transaction(function () use ($request, $poll, $options) {
            $request->user()->polls()->save($poll);
            $poll->options()->saveMany($options); //NÃO é bulk insert, é várias queries insert simples
        });
        return redirect(route('polls.index'));
        // dd(DB::getQueryLog());
    }

    /**
     * Display the specified resource.
     */
    public function show(Poll $poll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poll $poll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePollRequest $request, Poll $poll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poll $poll)
    {
        //
    }
}
