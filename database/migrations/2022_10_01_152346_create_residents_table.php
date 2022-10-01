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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("middle_name")->nullable();
            $table->string("last_name");
            $table->string("email");
            $table->string("contact_number");
            $table->string("gender")->nullable();
            $table->date("birthdate")->nullable();
            $table->longText("address1");
            $table->longText("address2")->nullable();
            $table->longText("profile_picture")->nullable();
            $table->integer("enabled")->default(0);
            $table->integer("is_4ps_member")->default(0);
            $table->dateTime("4ps_member_at")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residents');
    }
};
