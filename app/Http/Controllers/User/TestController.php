<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use App\Models\Participant;
use App\Models\Instruction;

class TestController extends Controller
{
    //
    public function test()
    {
        $instructions = Instruction::all();   
        return view('pages.user.test',compact('instructions'));
    }

    public function participant()
    {
        return view('pages.user.participant');
    }

    public function store_participant(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($data);
        return redirect()->route('login')->with('success','biodata sudah terisi, silahkan login');
    }
}
