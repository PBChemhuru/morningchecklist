<?php

use App\Models\checklist_items;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Capsule\Manager;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalystController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamleaderController;

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/Teamleaderlanding', function () {
    return view('Teamleaderlanding'); 
  })->middleware(['auth', 'verified'])->name('Teamleaderlanding');



  Route::get('/dashboard', function () {
    return view('dashboard'); 
  })->middleware(['auth', 'verified'])->name('dashboard');

  Route::get('/Teamleaderlanding', function () {
    return view('Teamleaderlanding'); 
  })->middleware(['auth', 'verified'])->name('Teamleader');

  Route::get('/Managerlanding', function () {
    return view('Managerlanding'); 
  })->middleware(['auth', 'verified'])->name('Manager');

  Route::get('/home', function () {
    $user= auth()->user()->Role;
        if($user=='Analyst')
        {
            $checklist_items= checklist_items::all();
            return view('dashboard',['user'=>$user,'checklist_items'=>$checklist_items]);
        }
        elseif($user=='TeamLead')
        {
            return view('Teamleaderlanding',['user'=>$user]);
        }
        else
        {
            return view('/Managerlanding',['user'=>$user]);
        }
  })->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/dashboard',[AnalystController::class, 'store']);
//delete checklist items
Route::delete('/{checklist_item}',[ManagerController::class, 'Delete'])->middleware(['auth', 'verified'])->name('destroy');;
//sign off checklist
Route::get('/Teamleaderlanding/{checklist}',[TeamleaderController::class, 'signoff']);
//show checklist archive
Route::get("/checklistarchive",[ArchiveController::class, 'show'])->middleware(['auth', 'verified'])->name('checklistarchive');
//fitler archive 
Route::get("/archivesearch",[ArchiveController::class, 'search'])->middleware(['auth', 'verified'])->name('archivesearch');
//create new item on checklist
Route::get("/checklistitems",[ManagerController::class, 'store'])->middleware(['auth', 'verified'])->name('checklistitems');
//update checklist items
Route::get("/checklistitems/edit",[ManagerController::class, 'update'])->middleware(['auth', 'verified'])->name('update');
//show admin page
Route::get("/Adminlanding",[AdminController::class, 'show'])->middleware(['auth', 'verified'])->name('update');
//create pdf
Route::get("/download/{id}",[ArchiveController::class, 'download'])->middleware(['auth', 'verified'])->name('download');