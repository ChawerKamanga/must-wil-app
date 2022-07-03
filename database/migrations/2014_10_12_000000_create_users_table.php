<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // @Todo remove the default gender
            $table->char('gender')->default('M'); 
            $table->string('email')->unique();
            $table->string('phone_number')->nullable()->unique();
            $table->foreignId('programme_id')->nullable()->constrained();
            $table->foreignId('organization_id')->nullable()->constrained();
            // @Todo remove the nullable gender
            $table->foreignId('role_id')->nullable()->constrained();
            $table->string('reg_number')->nullable()->unique();
            $table->unsignedTinyInteger('year_of_study')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
