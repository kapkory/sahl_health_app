<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependantPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependant_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('dependant_ids');
			$table->double('amount')->nullable();
			$table->integer('member_id');
			$table->integer('status')->default(0);
			$table->text('reference')->nullable();
			$table->string('mode')->default('M-PESA');
			$table->string('comments')->nullable();
			$table->dateTime('started_on')->nullable();
			$table->dateTime('ends_on')->nullable();
			$table->integer('payer_id');
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
        Schema::dropIfExists('dependant_payments');
    }
}
