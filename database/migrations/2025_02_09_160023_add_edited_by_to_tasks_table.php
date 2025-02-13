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
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // user_id to associate the task with the user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // FK constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop the foreign key
            $table->dropColumn('user_id'); // Drop the column
        });
    }
};
