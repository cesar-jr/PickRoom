<?php

namespace App\Http\Controllers;

use App\Enums\PollType;
use App\Http\Requests\StorePollRequest;
use App\Http\Requests\UpdatePollRequest;
use App\Models\Poll;
use App\Models\Option;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('poll.public-list');
    }

    public function my()
    {
        return view('poll.list');
    }

    public function list(Request $request)
    {
        $data = $request->validate([
            'search' => [ //verificar melhor esse search, maiusculas e minusculas e talvez fazer o role do espaço
                'string',
                'max:255',
            ],
            'type' => [
                'required',
                'string',
                'in:user,public',
            ],
        ]);

        abort_if($data['type'] != 'public' && !Auth::check(), 401);

        if ($data['type'] == 'public') {
            $records = Poll::where('type', PollType::PUBLIC);
        } else {
            $records = Poll::whereBelongsTo($request->user())->withCount('votes');
        }
        $records->where(function (Builder $query) use ($data) {
            if ($data['search'] ?? null) {
                $query->where('question', 'ilike', '%' . $data['search'] . '%');
            }
        })->orderBy('id', 'desc');
        return $records->paginate(10)->withQueryString();
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
            'type' => $validated['type'],
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
        return redirect(route('polls.my'));
        // dd(DB::getQueryLog());
    }

    /**
     * Display the specified resource.
     */
    public function show(Poll $poll)
    {
        Gate::authorize('view', $poll);

        $poll_id = $poll->id;
        $votes_count = Vote::whereBelongsTo($poll)->count();

        $result_query = DB::select("
            SELECT elem::text AS id, COUNT(*) AS occurrences
            FROM votes, jsonb_array_elements_text(options) AS elem
            WHERE poll_id = $poll_id
            GROUP BY elem::text;
        ");

        $votes_by_options = [];
        foreach ($result_query as $record) {
            $votes_by_options[$record->id]['total'] = $record->occurrences;
            $votes_by_options[$record->id]['percentage'] = round(($record->occurrences / $votes_count) * 100);
        }

        return view('poll.result', [
            'poll' => $poll,
            'votes_by_options' => $votes_by_options,
            'votes_count' => $votes_count,
        ]);
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
        Gate::authorize('update', $poll);
        $validated = $request->validated();
        $poll->active = !!$validated['active'];
        $poll->save();
        $this->toast(__("Poll no longer active"), "success");
        return redirect(route('polls.show', ['poll' => $poll]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poll $poll)
    {
        //
    }
}
