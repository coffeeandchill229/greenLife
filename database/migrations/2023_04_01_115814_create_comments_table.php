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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->bigInteger('post_id')->unsigned()->nullable();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('post_id')->references('id')->on('posts');

            $table->string('content');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
