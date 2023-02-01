<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectIdToPurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("purchases", function (Blueprint $table) {
            $table->unsignedBigInteger("project_id")->nullable();
            $table
                ->foreign("project_id")
                ->references("id")
                ->on("projects");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("purchases", function (Blueprint $table) {
            $table->dropForeign(["project_id"]);
            $table->dropColumn("project_id");
            //
        });
    }
}
