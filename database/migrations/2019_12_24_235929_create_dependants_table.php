<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependants', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('user_id')->unsigned();
			$table->string('first_name');
			$table->string('last_name')->nullable();
			$table->string('other_name')->nullable();
			$table->integer('identification_type_id')->nullable();
			$table->string('identification_number')->nullable();
			$table->enum('relationship_type',['spouse','child','parent','grand parent','grand children'])->default('child');
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
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
        Schema::dropIfExists('dependants');
    }
}
