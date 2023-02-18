<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("purchase_items", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id")->unsigned();
            $table->unsignedBigInteger("unit_id")->unsigned();
            $table->float("price");
            $table->integer("count");
            $table->unsignedBigInteger("purchase_id")->unsigned();
            $table->timestamps();

            $table
                ->foreign("purchase_id")
                ->references("id")
                ->on("purchases")
                ->onDelete("cascade");
            $table
                ->foreign("unit_id")
                ->references("id")
                ->on("units")
                ->onDelete("cascade");
            $table
                ->foreign("product_id")
                ->references("id")
                ->on("products")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("purchase_items");
    }
}
