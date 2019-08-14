<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smGoods', function (Blueprint $table) {
            $table->string('GoodsID',50)->primary();
            $table->string('GoodsNo', 50)->unique();
            $table->string('GoodsBarcode', 50)->nullable();
            $table->string('GoodsName', 255);
            $table->decimal('GoodsQty', 8, 2);
            $table->decimal('GoodsPrice', 8, 2);
            $table->decimal('GoodsCost', 8, 2);
            $table->string('GoodsUnitID')->nullable();
            $table->string('GoodsUnitName', 255)->nullable();
            $table->string('GoodsLocationID')->nullable();
            $table->string('GoodsLocationName', 255)->nullable();
            $table->string('CreatedByID', 20);
            $table->dateTime('CreatedDate');
            $table->string('ModifiedByID', 20)->nullable();
            $table->dateTime('ModifiedDate')->nullable();
            $table->boolean('IsBarcode');
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
        Schema::dropIfExists('smGoods');
    }
}
