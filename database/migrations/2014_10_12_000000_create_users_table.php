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
            $table->string('display_name')->comment('tên hiển thị');
            $table->string('full_name')->comment('họ và tên');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('gender')->comment('giới tính')->nullable();
            $table->string('image')->comment('ảnh đại diện')->nullable();
            $table->string('address')->comment('địa chỉ')->nullable();
            $table->string('phone')->nullable()->comment('số điện thoại');
            $table->boolean('activate')->default(0);
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
