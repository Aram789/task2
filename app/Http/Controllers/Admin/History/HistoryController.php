<?php

namespace App\Http\Controllers\Admin\History;

use App\Http\Controllers\Controller;
use App\Http\Requests\HistoryRequest;
use App\Jobs\SendEmailJob;
use App\Mail\SendEmail;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = History::query()->paginate(15);

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
        $formData = $request->validated();
        $history = History::query()->create($formData);
        $id = $history->id;

        $data = [
            'url' => route('approved-history', compact('id') )
        ];
        $email = new SendEmail($data);
        SendEmailJob::dispatch($email);
        return redirect()->route('histories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function approved($id)
    {
        dd($id);
    }
}
