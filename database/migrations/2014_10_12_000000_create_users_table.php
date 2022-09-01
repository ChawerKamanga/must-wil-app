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
            $table->string('slug');
            $table->char('gender'); 
            $table->string('email')->unique();
            $table->string('phone_number')->nullable()->unique();
            $table->string('next_of_kin')->nullable()->unique();
            $table->foreignId('programme_id')->nullable()->constrained();
            $table->foreignId('organization_id')->nullable()->constrained();
            $table->foreignId('role_id')->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->string('reg_number')->nullable()->unique();
            $table->unsignedTinyInteger('is_allocated')->nullable();
            $table->string('profile_img_url')->nullable();
            $table->string('profile_img_name')->nullable();
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
