<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInstitutionsTableAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institutions', function (Blueprint $table) {
            $table->integer('county_id')->default(47);
            $table->tinyInteger('is_featured')->default(0);
            $table->string('town')->nullable();
            $table->string('logo_url')->nullable();
            $table->text('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institutions', function (Blueprint $table) {
            $table->dropColumn('county_id');
            $table->dropColumn('is_featured');
            $table->dropColumn('town');
            $table->dropColumn('logo_url');
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
        });
    }
}
