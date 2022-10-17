<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentAlertActionTakenBy extends Model
{
    use HasFactory;

    const TABLENAME = "incident_alert_action_taken_bies";
    
    const FIELD_INCIDENT_ALERT_ID = "incident_alert_id";
    const FIELD_USER_ID  = "user_id";
}
