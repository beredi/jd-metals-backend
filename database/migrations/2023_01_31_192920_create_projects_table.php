<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("projects", function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->text("description")->nullable();
            $table->date("planned_start")->nullable();
            $table->date("planned_end")->nullable();
            $table->date("real_start")->nullable();
            $table->date("real_end")->nullable();
            $table->unsignedBigInteger("customer_id");
            $table
                ->foreign("customer_id")
                ->references("id")
                ->on("customers");
            $table->unsignedBigInteger("project_type_id");
            $table
                ->foreign("project_type_id")
                ->references("id")
                ->on("project_types");
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
        Schema::dropIfExists("projects");
    }
}
