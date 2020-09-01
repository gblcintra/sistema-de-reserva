<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicators', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('name_full');
            $table->string('name');
            //$table->string('sur_name');
            $table->integer('qtdpeople');
            $table->string('phone');
            $table->string('city');
            $table->string('state');
            $table->char('uf',2);
            $table->string('country')->default('Brasil');
            $table->string('cep');
            $table->string('address');
            $table->string('addressnumber');
            $table->string('complementaddress')->default('N/D');
            $table->string('modelcar')->nullable(true);
            $table->date('dateBirth')->nullable(true);
            $table->string('placa')->nullable(true);
            $table->string('color')->nullable(true);
            $table->string('type');
            $table->string('responsible');
            $table->string('cpf');
            $table->string('email');

            $table->string('motorHome')->nullable();
            $table->string('KombiHome')->nullable();
            $table->string('barracaTeto')->nullable();
            $table->string('barraca')->nullable();



            $table->string('free')->nullable()->default(0);
            $table->string('sock')->nullable()->default(0);
            $table->string('entire')->nullable()->default(0);


            $table->string('age')->nullable()->default(0);

            $table->string('phoneEmergency')->nullable(true);
            $table->string('paymentValue')->nullable(true)->default('0');
            $table->boolean('paymentStatus')->nullable(true)->default(0);
            $table->date('checkin');
            $table->date('checkout');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            

            $table->integer('c_auth')->nullable();
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
        Schema::dropIfExists('indicators');
    }
}
