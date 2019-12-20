<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('identification_type');
            $table->dropColumn('identification_number');
            $table->dropColumn('phone_number_verified_at');
            $table->timestamp('verified_at')->nullable();
            $table->string('verification_code')->nullable();
            $table->integer('institution_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('identification_type');
            $table->string('identification_number');
            $table->timestamp('phone_number_verified_at')->nullable();
            $table->dropColumn('verification_code');
            $table->dropColumn('institution_id');
            $table->dropColumn('verified_at');
        });
    }
}
