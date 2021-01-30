<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->string("name")->nullable();
             $table->string("company")->nullable();
             $table->string("address1")->nullable();
             $table->string("address2")->nullable();
             $table->string("country")->nullable();
             $table->string("state")->nullable();
             $table->string("city")->nullable();
             $table->integer("pincode")->nullable();
             $table->string('email')->unique();
             $table->string("mobile1")->nullable();
             $table->string("mobile2")->nullable();
             $table->string("alternate_name")->nullable();
             $table->string("alternate_relation")->nullable();
             $table->string("alternate_email")->nullable();
             $table->string("alternate_phone")->nullable();
             $table->string("profile_photo")->nullable();
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
        Schema::dropIfExists('clients');
    }
}
