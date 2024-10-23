<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checklist', function (Blueprint $table) {
            $table->id();
            $table->string('comment1')->nullable();
            $table->string('check1');
            $table->string('comment2')->nullable();
            $table->string('check2');
            $table->string('comment3')->nullable();
            $table->string('check3');
            $table->string('comment4')->nullable();
            $table->string('check4');
            $table->string('comment5')->nullable();
            $table->string('check5');
            $table->string('comment6')->nullable();
            $table->string('check6');
            $table->string('comment7')->nullable();
            $table->string('check7');
            $table->string('comment8')->nullable();
            $table->string('check8');
            $table->string('comment9') ->nullable();
            $table->string('check9');
            $table->string('comment10')->nullable();
            $table->string('check10');
            $table->string('comment11')->nullable();
            $table->string('check11');
            $table->string('comment12')->nullable();
            $table->string('check12');
            $table->string('comment13')->nullable();
            $table->string('check13');
            $table->string('comment14')->nullable();
            $table->string('check14');
            $table->string('comment15')->nullable();
            $table->string('check15');
            $table->string('comment16')->nullable();
            $table->string('check16');
            $table->string('comment17')->nullable();
            $table->string('check17');
            $table->string('comment18')->nullable();
            $table->string('check18');
            $table->string('comment19')->nullable();
            $table->string('check19');
            $table->string('comment20')->nullable();
            $table->string('check20');
            $table->string('comment21')->nullable();
            $table->string('check21');
            $table->string('comment22')->nullable();
            $table->string('check22');
            $table->string('comment23')->nullable();
            $table->string('check23');
            $table->string('comment24')->nullable();
            $table->string('check24');
            $table->string('comment25')->nullable();
            $table->string('check25');
            $table->string('comment26')->nullable();
            $table->string('check26');
            $table->string('comment27')->nullable();
            $table->string('check27');
            $table->string('comment28')->nullable();
            $table->string('check28');
            $table->string('comment29')->nullable();
            $table->string('check29');
            $table->string('analyst');
            $table->string('sign-off')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklist');
    }
};
