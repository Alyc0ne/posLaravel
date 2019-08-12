<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smUnit', function (Blueprint $table) {
            $table->string('UnitID',50)->primary();
            $table->string('UnitNo', 50)->unique();
            $table->string('UnitName', 255);
            $table->string('CreatedByID', 20);
            $table->dateTime('CreatedDate');
            $table->string('ModifiedByID', 20)->nullable();
            $table->dateTime('ModifiedDate')->nullable();
            $table->boolean('IsDelete');
            $table->boolean('IsInactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smUnit');
    }
}
