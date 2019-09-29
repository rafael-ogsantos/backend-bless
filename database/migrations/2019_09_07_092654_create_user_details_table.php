<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('segment')->nullable();
            $table->string('linked_user')->nullable();
            $table->string('client_user_cpf')->nullable();
            $table->string('id_of_user_in_system')->nullable();
            $table->string('place_of_issue')->nullable();
            $table->string('telephone')->nullable();
            $table->string('profile_image')->nullable()->default('user.png');
            $table->string('profession')->nullable();
            $table->string('mariage_status')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('complement')->nullable();
            $table->string('state')->nullable();
            $table->string('uf')->nullable();
            $table->string('franchise_user_cnpj')->nullable();
            $table->string('company_name')->nullable();
            $table->string('admin_user')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
