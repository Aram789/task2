<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\History;

class NoticeController extends Controller
{
    public function index()
    {
        $histories = History::query()
            ->where('status', '=',1)
            ->paginate(8);

        return view('welcome', compact('histories'));
    }
}
