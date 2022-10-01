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
           
            $table->string('usertype')->nullable()->comment('Student,Employee,Admin');
            $table->string('role')->nullable()->comment('admin=head of software, opearator,computer operator,user employee');
            $table->string('name')->nullable();
            $table->string('id_no')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->rememberToken();
            $table->tinyInteger('status')->default('1');
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('age')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            
            $table->string('f_name')->nullable();
            $table->string('m_name')->nullable();
            $table->string('religion')->nullable();
            $table->string('code')->nullable();
            $table->date('join_date')->nullable();
            $table->integer('designation_id')->nullable();
            $table->double('salary')->nullable();
            $table->foreignId('current_team_id')->nullable();
       
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
