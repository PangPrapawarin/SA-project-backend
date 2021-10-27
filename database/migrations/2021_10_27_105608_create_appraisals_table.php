<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisals', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->string('status')->default('in progress');
            $table->foreign('serial_number')
                ->references('serial_number')
                ->on('warranties');
            $table->foreign('warranty_start_date')
                ->references('warranty_start_date')
                ->on('warranties');
            $table->foreign('warranty_end_date')
                ->references('warranty_end_date')
                ->on('warranties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appraisals');
    }
}
