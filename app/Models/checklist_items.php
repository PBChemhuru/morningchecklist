<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checklist_items extends Model
{
   protected $table='checklist_items';

   protected $fillable =['item','action','frequency'];

   public $timestamps = false;
}
