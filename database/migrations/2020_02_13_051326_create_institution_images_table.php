<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_images', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('institution_id');
			$table->unsignedBigInteger('user_id');
			$table->string('path');
			$table->string('size')->nullable();
			$table->string('status')->default(0);
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
        Schema::dropIfExists('institution_images');
    }
}
