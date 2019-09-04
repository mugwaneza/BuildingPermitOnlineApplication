<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCellApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cellapplication', function (Blueprint $table) {

            $table->integerIncrements('id');
            $table->unsignedInteger('village_id')->nullable();
            $table->unsignedInteger('coordinator_id')->nullable();
            $table->string('approval_status');
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('village_id')
                ->references('id')
                ->on('villageapplication')
                ->onDelete('cascade');
            $table->foreign('coordinator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cellapplication');
    }
}
