<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class IncidentAlert extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    const TABLENAME = "incident_alerts";

    const FIELD_ID = "id";
    const FIELD_RESIDENT_ID = "resident_id";
    const FIELD_INCIDENT_TYPE_ID = "incident_type_id";
    const FIELD_REPORT_SUMMARY = "report_summary";
    const FIELD_DESCRIPTION = "description";
    const FIELD_REPORTED_AT = "reported_at";
    const FIELD_STATUS = "status";
    

    const STATUS_PENDING = 0;
    const STATUS_ONGOING = 1;
    const STATUS_RESOLVED = 2;


    protected $fillable = [
        self::FIELD_RESIDENT_ID,
        self::FIELD_INCIDENT_TYPE_ID,
        self::FIELD_REPORT_SUMMARY,
        self::FIELD_DESCRIPTION,
        self::FIELD_REPORTED_AT,
        self::FIELD_STATUS,
    ];

    protected $hidden = [
        "deleted_at",
    ];


    public function resident() {
        return $this->belongsTo(Resident::class);
    }

    public function Responders() {
        return IncidentAlertActionTakenBy::where(IncidentAlertActionTakenBy::FIELD_INCIDENT_ALERT_ID, $this->id)->get();
    }

    public function IncidentType() {
        return $this->belongsTo(IncidentType::class);
    }
}