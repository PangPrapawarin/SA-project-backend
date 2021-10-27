<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranties', function (Blueprint $table) {
            $table->timestamps('warranty_start_date');
            $table->timestamps('warranty_end_date');
            $table->string('customer_name');
            $table->foreign('model')
                ->references('model')
                ->on('products');
            $table->foreign('color')
                ->references('color')
                ->on('products');
            $table->foreign('serial_number')
                ->references('serial_number')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warranties');
    }
}
