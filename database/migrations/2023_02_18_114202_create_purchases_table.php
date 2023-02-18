<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("purchases", function (Blueprint $table) {
            $table->id();
            $table->date("date_of_purchase");
            $table->boolean("paid")->default(false);
            $table->unsignedBigInteger("supplier_id");
            $table
                ->foreign("supplier_id")
                ->references("id")
                ->on("suppliers");
                $table
                    ->foreignId("project_id")
                    ->nullable()
                    ->references("id")
                    ->on("projects")
                    ->onDelete("set null");
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
        Schema::dropIfExists("purchases");
    }
}
