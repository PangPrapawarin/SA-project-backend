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

            $table->unsignedBigInteger('invoices_id');
            $table->foreign('invoices_id')
            ->references('id')
            ->on('invoices')
            ->cascadeOnDelete();

            $table->date('paid_date');
            $table->integer('time_total');
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
