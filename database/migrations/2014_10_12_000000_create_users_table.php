<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*
         *

        `id`, `name`, `email`, `password`, `phone`,
         `status`, `gender`, `address`, `avatar`, `facebook_email`,
         `facebook_id`, `facebook_name`, `remember_token`, `ward_id`,
        `district_id`, `province_id`, `created_at`, `updated_at`
        , `confirmed`, `confirmation_code`, `type`, `is_updated`, `birthday`
         */
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('phone');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('gender')->default('1');
            $table->string('address', '255');
            $table->string('facebook_email', '255');
            $table->string('facebook_id', '100');
            $table->string('facebook_name', '255');
            $table->string('ward_id', '100');
            $table->string('district_id', '100');
            $table->string('province_id', '100');
            $table->enum('confirmed', ['new', 'approved', 'cancel']);
            $table->string('confirmation_code', '255');
            $table->enum('type', ['account', 'facebook']);
            $table->tinyInteger('is_updated')->default('0');
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
}
