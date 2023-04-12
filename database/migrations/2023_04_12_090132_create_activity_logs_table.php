<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('week_number');
            $table->smallInteger('is_approved')->default(0);
            $table->date('from_date');
            $table->date('to_date');
            $table->unsignedInteger('days_present');
            $table->unsignedInteger('days_absent');
            $table->unsignedInteger('user_id');
            $table->text('summary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }
};