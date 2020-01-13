<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_services', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('service_id');
			$table->integer('institution_id');
			$table->double('cost')->nullable();
			$table->integer('discount_rate')->nullable();
			$table->tinyInteger('status')->default(0);
			$table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('institution_services');
    }
}
