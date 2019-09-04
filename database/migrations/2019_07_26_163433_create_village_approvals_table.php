<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villageapplication', function (Blueprint $table) {

            $table->integerIncrements('id');
            $table->unsignedInteger('applicant_id')->nullable();
            $table->unsignedInteger('coordinator_id')->nullable();
            $table->string('reason');
            $table->string('landcertificate');
            $table->string('approval_status');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('coordinator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('applicant_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->engine = "InnoDB";



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villageapplication');
    }
}
