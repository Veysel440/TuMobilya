<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('activity_logsController', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->string('model');
            $table->unsignedBigInteger('model_id');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('activity_logsController');
    }
};
