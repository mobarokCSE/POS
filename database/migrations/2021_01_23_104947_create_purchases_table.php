<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('supplier_shopName');
            $table->string('supplier_address');
            $table->string('supplier_email');
            $table->string('supplier_phone');
            $table->string('purchase_no');
            $table->string('purchase_date');
            $table->string('total_product');
            $table->string('sub_total');
            $table->string('tax');
            $table->string('total');
            $table->string('payment_type');
            $table->string('pay');
            $table->string('due')->nullable();
            $table->string('status')->default('Success');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}