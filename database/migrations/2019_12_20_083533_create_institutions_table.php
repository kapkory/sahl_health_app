<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name');
			$table->string('slug');
			$table->string('brand_name')->nullable();
			$table->string('address')->nullable();
			$table->string('address_postal_code')->nullable();
			$table->integer('institution_level_id')->nullable();
			$table->integer('organization_type_id')->nullable();
			$table->integer('is_branch')->nullable();
			$table->integer('parent_institution_id')->nullable();
			$table->integer('user_id');
			$table->double('discount')->default(0);
			$table->longText('intro')->nullable();
			$table->string('featured_image')->nullable();
			$table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('institutions');
    }
}
