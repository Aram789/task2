<?php

namespace App\Http\Controllers\Admin\History;

use App\Events\NoticeEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\HistoryRequest;
use App\Jobs\SendEmailJob;
use App\Mail\SendEmail;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = History::query()
            ->paginate(8);

        return view('admin.history.index', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.history.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HistoryRequest $request)
    {
        $validatedData = $request->validated();

        $history = History::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'token' => Str::random(32),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $urlHash = $history->token;

        $data = [
            'url' => route('histories.show', compact('urlHash')),
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ];

        $email = new SendEmail($data);
        SendEmailJob::dispatch($email);

        return redirect()->route('histories.index');
    }

    public function show($urlHash)
    {
        $history = History::query()
            ->where('token', $urlHash)
            ->first();

        return view('admin.history.show', compact('history'));
    }

    public function update(History $history)
    {
        if ($history->status === 1) {
            return view('admin.history.show', compact('history'))->with('message', 'The story has already been published');
        }
        $history->update(['status' => 1]);

        broadcast(new NoticeEvent($history));
        return redirect()->route('histories.index');
    }

    public function filter(Request $request)
    {
        $request->validate([
            'status' => 'in:all,0,1',
        ]);

        $histories = History::filterByStatus($request->status)->paginate(8);

        return response()->json($histories);
    }
}
