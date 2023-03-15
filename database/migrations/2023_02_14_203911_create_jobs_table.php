<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('category_name');
            $table->timestamps();
        });
        Schema::create('jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->unsignedBigInteger('talent_id');
            $table->string('job_title');
            $table->text('job_description');
            $table->decimal('budget', 8, 2)->nullable();
            $table->dateTime('deadline')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('talent_id')->references('talent_id')->on('talents');
            $table->foreign('category_id')->references('category_id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
