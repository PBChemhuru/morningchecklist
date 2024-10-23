<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\checklist_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AnalystController extends Controller
{
    public function store(Request $request)
    {

        $user = auth()->user()->Username;
        $formfields = $request->validate(
            [
                'check1' => 'required',
                'check2' => 'required',
                'check3' => 'required',
                'check4' => 'required',
                'check5' => 'required',
                'check6' => 'required',
                'check7' => 'required',
                'check8' => 'required',
                'check9' => 'required',
                'check10' => 'required',
                'check11' => 'required',
                'check12' => 'required',
                'check13' => 'required',
                'check14' => 'required',
                'check15' => 'required',
                'check16' => 'required',
                'check17' => 'required',
                'check18' => 'required',
                'check19' => 'required',
                'check20' => 'required',
                'check21' => 'required',
                'check22' => 'required',
                'check23' => 'required',
                'check24' => 'required',
                'check25' => 'required',
                'check26' => 'required',
                'check27' => 'required',
                'check28' => 'required',
                'check29' => 'required',
            ]
        );
         $checklist_items=checklist_items::count();
        $count=1;
        for($x=1;$x>$checklist_items;$x++)
        {
            $comment = 'comment' . $count;
            $formfields[$comment] = $request->$comment;
            $count++;
        }
        $formfields['analyst'] = $user;
        $formfields['signoff'] = 1;


        Checklist::create($formfields);

        return redirect()->route('home')
            ->with('message', 'Checklist saved successfully.');
    }
}
