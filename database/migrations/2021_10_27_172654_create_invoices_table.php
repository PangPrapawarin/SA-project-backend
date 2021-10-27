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
            $table->foreign('employee_name')
            ->references('name')
            ->on('users');
            $table->foreign('customer_name')
            ->references('customer_name')
            ->on('warranties');
            $table->foreign('employee_id')
            ->references('id')
            ->on('users');
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
