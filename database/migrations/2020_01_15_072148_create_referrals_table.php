<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('user_id')->unsigned(); //the guy who refers
			$table->integer('referral_id')->unsigned(); //referred guy;
			$table->double('amount')->nullable();
			$table->integer('status')->default(0); //unclicked
			$table->integer('paid')->default(0); //unpaid
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
        Schema::dropIfExists('referrals');
    }
}
