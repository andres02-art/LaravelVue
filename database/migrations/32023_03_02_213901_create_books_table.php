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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('stock');
            $table->text('description');
            $table->foreignId('authors_id')->index('authBoo');
            $table->foreign('authors_id')->references('id')->on('authors')->onUpdate('cascade')->onDelete('cascade')->after('authors_id');
            $table->foreignId('category_id')->index('catBoo');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade')->after('category_id');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
