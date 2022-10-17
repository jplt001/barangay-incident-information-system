<?php

use App\Models\IncidentAlert;
use App\Models\User;
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
        Schema::create('incident_alert_action_taken_bies', function (Blueprint $table) {
            $table->bigIncrements("id");
            // $table->unsignedBigInteger("incident_alert_id");
            $table->foreignId("incident_alert_id")->constrained("incident_alerts")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("user_id")->constrained("users")->onUpdate("cascade")->cascadeOnDelete();
            // $table->unsignedBigInteger("user_id");
            $table->dateTime("arrived_at")->nullable();
            $table->dateTime("resolved_at")->nullable();
            $table->double("latitude")->nullable();
            $table->double("longitude")->nullable();
            $table->dateTime("gps_time")->nullable();
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign("incident_alert_id")->references("id")->on(IncidentAlert::class);
            // $table->foreign("user_id")->references(User::FIELD_ID)->on(User::TABLENAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incident_alert_action_taken_bies');
    }
};
