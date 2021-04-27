<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name", 120);
            $table->string("email", 50)->nullable();
            $table->string("mobile", 20)->nullable();
            // $table->integer("age")->default(1);
            // $table->text("address_info")->comment("Please provide you full address");
            // $table->enum("gender", ["male", "female", "others"]);
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
        Schema::dropIfExists('students');
    }
}
