<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_repair');
            $table->dateTime('start_fix');
            $table->dateTime('end_fix');
            $table->string('invoice_status')->default('in progress');
            $table->foreign('employee_name')
            ->constrained()
            ->references('name')
            ->on('users');
            $table->foreign('employee_id')
            ->constrained()
            ->references('id')
            ->on('users');
            $table->foreign('product_name')
            ->constrained()
            ->references('product_name')
            ->on('appraisals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
