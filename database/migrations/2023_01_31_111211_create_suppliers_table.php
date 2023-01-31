<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("suppliers", function (Blueprint $table) {
            $table->id();
            $table->string("name", 255)->nullable(false);
            $table->string("address", 255)->nullable();
            $table->string("phone", 20)->nullable();
            $table->string("email", 255)->nullable();
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
        Schema::dropIfExists("suppliers");
    }
}
