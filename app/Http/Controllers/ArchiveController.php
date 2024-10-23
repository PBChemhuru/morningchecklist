<?php

namespace App\Http\Controllers;

use App\Models\User;

use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Checklist;
use Illuminate\Http\Request;
use App\Models\checklist_items;

class ArchiveController extends Controller
{
    public function show() 
    {
        return view('/checklistarchive',);
    }

    public function search(Request $request) 
    {
        $asearch=$request->asearch;
        $tsearch=$request->tsearch;
        $dsearch=$request->dsearch;

        if(is_null($asearch) && is_null($tsearch) && is_null($dsearch))
        {
            $lists=Checklist::all();
        }
        elseif(is_null($asearch) && is_null($tsearch))
        {
            $lists=Checklist::where('created_at','like',$dsearch)->get();
        }
        elseif(is_null($asearch) && is_null($dsearch))
        {
            $lists=Checklist::where('signoff','like','%'.$tsearch.'%')->get();
        }
        elseif(is_null($tsearch) && is_null($dsearch))
        {
            $lists=Checklist::where('analyst','like','%'.$asearch.'%')->get();
        }
        elseif(is_null($dsearch))
        {
            $lists=Checklist::where('analyst','LIKE','%'.$asearch.'%',)
                                ->where('signoff','like','%'.$tsearch.'%')->get();
        }
        elseif(is_null($tsearch))
        {
            $lists=Checklist::where('analyst','LIKE','%'.$asearch.'%',)
                                ->where('created_at','like',$dsearch)->get();
        }
        elseif(is_null($asearch))
        {
            $lists=Checklist::where('signoff','LIKE','%'.$tsearch.'%',)
                                ->where('created_at','like',$dsearch)->get();
        }
        else
        {
            $lists=Checklist::where('analyst','LIKE','%'.$asearch.'%',)
                                ->where('signoff','like','%'.$tsearch.'%')
                                    ->where('created_at','like',$dsearch)->get();

        }
        
        return view('archivesearch',['lists'=>$lists]);
    }


    public function download($id)
    {
        $top=2;
        $right=2;
        $left=2;
        $bottom=2;
        $reps = Checklist::where('id', 'LIKE', $id)->first();
        $date= $reps->created_at;
        $data=['id'=>$id];    
        $pdf = PDF::loadView('Pdf',$data)->setPaper('a4', 'portrait');
        return $pdf->download($date.'.pdf');
        
    }
}
