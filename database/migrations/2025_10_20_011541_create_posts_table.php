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
    Schema::create('posts', function (Blueprint $table) {
        $table->id('id_post'); // Primary key
        $table->unsignedBigInteger('id_user'); 
        $table->string('postcontent', 280); 
        $table->dateTime('date_posted')->useCurrent(); 

       
        $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
