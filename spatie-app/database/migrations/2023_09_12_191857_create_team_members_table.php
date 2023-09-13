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
        Schema::create('team_members', function (Blueprint $table) {
            $table->unsignedBigInteger('Team_ID');
            $table->unsignedBigInteger('User_ID');
            $table->timestamps();
            // Add foreign key constraints
            $table->foreign('Team_ID')->references('id')->on('teams');
            $table->foreign('User_ID')->references('id')->on('users');
            // Define the primary key with both columns
            $table->primary(['Team_ID', 'User_ID']);
        });
    }


    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};


