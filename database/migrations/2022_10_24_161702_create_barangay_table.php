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
        Schema::create('barangays', function (Blueprint $table) {
            $table->id();
            $table->string("code")->nullable();
            $table->string("name");
            $table->longText("address1");
            $table->longText("address")->nullable();
            $table->string("contact_number", 11)->nullable();
            $table->string("landline_number", 15)->nullable();
            $table->double("latitude")->nullable();
            $table->double("longitude")->nullable();
            $table->longText("logo")->nullable();
            $table->integer("setup_finished")->default(0);
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
        Schema::dropIfExists('barangay');
    }
};
