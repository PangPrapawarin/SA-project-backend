<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('appraisals_id');
            $table->foreign('appraisals_id')
            ->references('id')
            ->on('appraisals')
            ->cascadeOnDelete();

            $table->dateTime('paid_date');
            $table->string('bill_status')->default('waiting to pay');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
