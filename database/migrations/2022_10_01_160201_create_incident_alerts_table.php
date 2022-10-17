<?php

use App\Models\Resident;
use App\Models\IncidentType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_alerts', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("resident_id")->comment("Reported By");
            $table->unsignedBigInteger("incident_type_id")->comment("Primary ID of incident_types table.");
            $table->text("report_summary")->comment("summary inforamtion of incident.");
            $table->longText("description")->nullable()->comment("Detailed information of the incident.");
            $table->dateTime("reported_at")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer("status")->default(0);
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign("resident_id")->references("id")->on(Resident::class);
            // $table->foreign("incident_type_id")->references("id")->on(IncidentType::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incident_alerts');
    }
};
