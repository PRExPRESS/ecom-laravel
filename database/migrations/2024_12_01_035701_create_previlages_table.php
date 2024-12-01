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
        Schema::create('previlages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('add_product');
            $table->boolean('edit_product');
            $table->boolean('delete_product');
            $table->boolean('add_category');
            $table->boolean('edit_category');
            $table->boolean('delete_category');
            $table->boolean('add_brand');
            $table->boolean('edit_brand');
            $table->boolean('delete_brand');
            $table->boolean('add_color');
            $table->boolean('edit_color');
            $table->boolean('delete_color');
            $table->boolean('add_size');
            $table->boolean('edit_size');
            $table->boolean('add_order');
            $table->boolean('delete_size');
            $table->boolean('edit_order');
            $table->boolean('delete_order');
            $table->boolean('edit_user');
            $table->boolean('delete_user');
            $table->boolean('add_user');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previlages');
    }
};
