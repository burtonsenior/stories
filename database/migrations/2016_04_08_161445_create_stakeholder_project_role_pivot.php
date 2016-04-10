<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStakeholderProjectRolePivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_stakeholder_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_stakeholder_id')->unsigned();
            $table->integer('role_id')->unsigned()->nullable();
            $table->timestamps();
          
            $table->foreign('project_stakeholder_id')->references('id')->on('project_stakeholder')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_stakeholder_role');
    }
}
