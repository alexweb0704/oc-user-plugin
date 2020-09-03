<?php

namespace GeeksLab\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateGeeksLabUserGroups extends Migration
{
    public function up()
    {
        Schema::create('geekslab_user_groups', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('code')->unique()->index();
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
        Schema::dropIfExists('geekslab_user_groups');
    }
}