<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("customers", function (Blueprint $table) {
            $table->id();
            $table->boolean("is_company")->default(false);
            $table->string("name")->nullable();
            $table->string("lastname")->nullable();
            $table->string("company_name")->nullable();
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("email");
            $table->string("pib")->nullable();
            $table->string("maticni_broj")->nullable();
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
        Schema::dropIfExists("customers");
    }
}
