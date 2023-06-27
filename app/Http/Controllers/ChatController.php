<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('chat');
        $this->middleware(['auth', 'verified']);
    }

    public function chat()
    {
        return redirect('chat');
    }
    public function chatid($id)
    {

        return redirect('chat/{$id}');
    }
}
