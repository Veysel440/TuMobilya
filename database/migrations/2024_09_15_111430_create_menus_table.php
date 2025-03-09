<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->string('page_description')->nullable();
            $table->string('page_title')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('url');
        });
    }
};
