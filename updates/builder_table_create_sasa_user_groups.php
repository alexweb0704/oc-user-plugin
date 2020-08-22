<?php namespace Sasa\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSasaUserGroups extends Migration
{
    public function up()
    {
        Schema::create('sasa_user_groups', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(0);
            $table->integer('sort_order')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sasa_user_groups');
    }
}
