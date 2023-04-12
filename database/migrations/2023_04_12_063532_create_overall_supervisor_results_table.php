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
        Schema::create('overall_supervisor_results', function (Blueprint $table) {
            $table->id();
            $table->string('scores');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('assesor_id');
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
        Schema::dropIfExists('overall_supervisor_results');
    }
};