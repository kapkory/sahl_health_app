<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('member_id')->unsigned();
			$table->integer('package_id')->unsigned();
			$table->dateTime('started_on')->nullable();
			$table->dateTime('ends_at')->nullable();
			$table->double('amount')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('member_packages');
    }
}
