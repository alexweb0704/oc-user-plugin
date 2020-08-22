<?php namespace Sasa\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSasaUserUsers extends Migration
{
    public function up()
    {
        Schema::create('sasa_user_users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('password');
            $table->string('activation_code')->nullable();
            $table->string('reset_password_code')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('last_logined_at')->nullable();
            $table->timestamp('last_seen_at')->nullable();
            $table->timestamp('banned_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sasa_user_users');
    }
}
