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
            $table->timestamps();
            $table->date('start_fix');
            $table->date('end_fix');

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();

            $table->unsignedBigInteger('appraisals_id');
            $table->foreign('appraisals_id')
            ->references('id')
            ->on('appraisals')
            ->cascadeOnDelete();
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
