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
            $table->timestamps('start_fix');
            $table->timestamps('start_fix');
            $table->string('invoice_status')->default('in progress');
            $table->foreign('employee_name')
            ->references('name')
            ->on('users');
            $table->foreign('employee_id')
            ->references('id')
            ->on('users');
            $table->foreign('product_name')
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
