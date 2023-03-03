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
        Schema::create('lends', function (Blueprint $table) {
            $table->id();
            $table->date('date_out');
            $table->date('date_in');
            $table->boolean('status');
            $table->foreignId('customer_user_id')->index('UsrcLen');
            $table->foreign('customer_user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('owner_user_id')->index('UsroLend');
            $table->foreign('owner_user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('book_id')->index('booLend');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lends');
    }
};
