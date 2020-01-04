<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('member_id')->unsigned();
			$table->integer('package_id')->unsigned();
			$table->double('amount');
			$table->string('reference')->nullable();
			$table->string('payment_mode')->default('M-PESA');
			$table->integer('status')->default(0);
			$table->string('comment')->nullable();
			$table->integer('payer_id')->nullable();
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
        Schema::dropIfExists('member_payments');
    }
}
