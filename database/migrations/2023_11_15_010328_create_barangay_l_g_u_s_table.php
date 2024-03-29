<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangayLGUSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangay_l_g_u_s', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('image')->nullable();
            $table->boolean('isSecretary')->default(false);
            $table->string('address')->nullable();
            $table->string('contactNo')->nullable();
            $table->string('schedule')->nullable();
            $table->boolean('isTreasurer')->default(false);
            // $table->enum('role', ['Captain', 'Councilors', 'Treasurer', 'Secretary']);
            $table->string('role')->nullable();
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
        Schema::dropIfExists('barangay_l_g_u_s');
    }
}
