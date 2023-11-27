<?php

namespace App\Http\Controllers\Admin\History;

use App\Http\Controllers\Controller;
use App\Http\Requests\HistoryRequest;
use App\Jobs\SendEmailJob;
use App\Mail\SendEmail;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = History::query()
            ->paginate(15);

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

        $request = [
            'title' => $request->validated()['title'],
            'description' => $request->validated()['description'],
            'token' => hash('sha256', Str::random(32))
        ];

        $history = History::query()
            ->create($request);

        $urlHash = $history->token;

        $data = [
            'url' => route('histories.show', compact('urlHash')),
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
        $history->update(['status' => 1]);

        return view('admin.history.show', compact('history'));

    }
}
