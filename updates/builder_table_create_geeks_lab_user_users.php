<?php

namespace GeeksLab\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateGeeksLabUserUsers extends Migration
{
    public function up()
    {
        Schema::create('geekslab_user_users', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('surname')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('password');
            $table->string('activation_code')->nullable();
            $table->string('reset_password_code')->nullable();
            $table->timestamp('registered_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('logined_at')->nullable();
            $table->timestamp('last_seen_at')->nullable();
            $table->timestamp('banned_at')->nullable();
            $table->unique(['username', 'email']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('geekslab_user_users');
    }
}