<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string("name", 120);
            $table->integer("student_id")->nullable();
            $table->timestamp("created_at")->useCurrent(); // useCurrent() help to use current date and time
            $table->timestamp("updated_at")->useCurrent(); // useCurrent() help to use current date and time
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
