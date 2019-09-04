<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectorapplication', function (Blueprint $table) {

            $table->integerIncrements('id');
            $table->unsignedInteger('cell_id')->nullable();
            $table->unsignedInteger('landmanager_id')->nullable();
            $table->string('approval_status');
            $table->string('feeback');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('landmanager_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->engine = 'InnoDB';
            $table->foreign('cell_id')
                ->references('id')
                ->on('cellapplication')
                ->onDelete('cascade');
            $table->engine = 'InnoDB';



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectorapplication');
    }


}
