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
            $table->timestamps();
            $table
                ->foreignId("customer_id")
                ->nullable()
                ->references("id")
                ->on("customers")
                ->onDelete("set null");
            $table
                ->foreignId("project_type_id")
                ->nullable()
                ->references("id")
                ->on("project_types")
                ->onDelete("set null");
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
