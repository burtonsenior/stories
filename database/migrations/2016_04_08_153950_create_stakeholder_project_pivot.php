<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStakeholderProjectPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_stakeholder', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stakeholder_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('status_id')->unsigned()->nullable();
            $table->integer('influence')->unsigned()->nullable();
            $table->integer('interest')->unsigned()->nullable();
            $table->text('involvement')->nullable();
            $table->timestamps();
          
            $table->foreign('stakeholder_id')->references('id')->on('stakeholders')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_stakeholder');
    }
}
