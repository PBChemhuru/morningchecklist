<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;
use App\Models\checklist_items;

use Illuminate\Support\Facades\Schema;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Database\Schema\Blueprint;

class ManagerController extends Controller
{
    public function Delete($id)
    {
        checklist_items::destroy($id);

     return redirect()->route('home')
     ->with('message','Item deleted successfully.');
    }

    public function store(Request $request)
    {
            $formfields=$request->validate(
                [   
                    'item'=>'required',
                    'action'=>'required',
                    'frequency'=>'required'
                ]);
                
                
            checklist_items::create($formfields);
            Schema::table('checklists', function (Blueprint $table) {
                $count=checklist_items::count();
                $table->string('comment'. $count)->nullable();
            });

            return redirect()->route('home')
     ->with('message','Item Created successfully.');
            }

    public function update(Request $request)
        {
        $data=checklist_items::where('id',$request->id)->first();
        $item=$request->item;
        $action=$request->action;
        $frequency=$request->frequency;
        $data->item=$item;
        $data->action=$action;
        $data->frequency=$frequency;
        $data->save();
        return redirect()->route('home')
     ->with('message','item'.$request->itemid.' changed successfully.');
        }
    }

