<?php namespace Sasa\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSasaUserUserGroup extends Migration
{
    public function up()
    {
        Schema::create('sasa_user_user_group', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->index('user_id');
            $table->index('group_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sasa_user_user_group');
    }
}
