<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id('id_like');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_post');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_post')->references('id_post')->on('posts')->onDelete('cascade');

            $table->unique(['id_user', 'id_post']); // a user can like a post only once
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
