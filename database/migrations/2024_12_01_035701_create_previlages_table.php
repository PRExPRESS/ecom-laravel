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
            $table->boolean('add_product')->default(false);
            $table->boolean('edit_product')->default(false);
            $table->boolean('delete_product')->default(false);
            $table->boolean('add_category')->default(false);
            $table->boolean('edit_category')->default(false);
            $table->boolean('delete_category')->default(false);
            $table->boolean('add_brand')->default(false);
            $table->boolean('edit_brand')->default(false);
            $table->boolean('delete_brand')->default(false);
            $table->boolean('delete_order')->default(false);
            $table->boolean('edit_user')->default(false);
            $table->boolean('delete_user')->default(false);
            $table->boolean('add_user')->default(false);
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
