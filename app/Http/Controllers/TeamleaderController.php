<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;

class TeamleaderController extends Controller
{
    public function signoff(Checklist $checklist)
    {
        $user=auth()->user()->Username;
        $checklist->signoff=$user;
        $checklist->save();

        return redirect()->route('home')
     ->with('message','Checklist Signed off.');
    }

    public function show($id)
    {
        dd($id);
    }
}
