<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_responsible');
            $table->string('cpf_responsible');
            $table->string('name')->default("N/D");

            $table->string('free')->nullable()->default(0);
            $table->string('sock')->nullable()->default(0);
            $table->string('entire')->nullable()->default(0);

            $table->string('age')->nullable()->default(0);

            $table->string('cpf');
            $table->string('birth');
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
        Schema::dropIfExists('companions');
    }
}
