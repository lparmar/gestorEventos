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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('body_activity');
            $table->foreign('body_activity')->references('id')->on('body_activities')->onDelete('cascade');
            $table->date('date_of_celebration')->nullable();
            $table->unsignedBigInteger('activity_types');
            $table->foreign('activity_types')->references('id')->on('activity_types')->onDelete('cascade');
            $table->string('place_of_celebration')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
