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
            $table->foreign('id')
            ->constrained()
            ->references('id')
            ->on('invoices');
            $table->date('paid_date');
            $table->integer('time_total');
            $table->string('bill_status')->default('waiting to pay');
            $table->foreign('date_of_repair')
            ->constrained()
            ->references('date_of_repair')
            ->on('invoices');
            $table->foreign('employee_name')
            ->constrained()
            ->references('employee_name')
            ->on('invoices');
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
