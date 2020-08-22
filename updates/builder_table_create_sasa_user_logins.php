<?php namespace Sasa\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSasaUserLogins extends Migration
{
    public function up()
    {
        Schema::create('sasa_user_logins', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('label')->unique();
            $table->string('type');
            $table->string('code')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('activeted_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->index('label');
            $table->index('user_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sasa_user_logins');
    }
}
