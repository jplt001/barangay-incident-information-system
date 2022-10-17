<?php
namespace App\Services;

use App\Models\Resident;
use App\Models\IncidentType;
use App\Models\IncidentAlert;
use Illuminate\Support\Facades\DB;

class IncidentAlertService {

    protected $incidentAlert;
    protected $incidentType;
    protected $resident;
    function __construct(IncidentAlert $incidentAlert, IncidentType $incidentType, Resident $resident)
    {
        $this->incidentAlert = $incidentAlert;
        $this->incidentType = $incidentType;
        $this->resident = $resident;
    }
 
    
    public function fetchAll() {
        $alerts= $this->incidentAlert
                    ->with("resident")
                    ->with("IncidentType")
                    ->orderBy("id", "DESC")
                    ->get();
        $data = [];

        foreach($alerts as $alert) {
            $tmp = $alert;

            $firstName = $alert->resident->first_name;
            $lastName = $alert->resident->last_name;
            
            $incidentTypeName = $alert->IncidentType->name;
            $tmp = $tmp->toArray();
            $tmp['resident'] = $lastName . ", ". $firstName;
            $tmp['incident_type'] =$incidentTypeName;
            array_push($data, $tmp);
        }

        return $data;
    }
}