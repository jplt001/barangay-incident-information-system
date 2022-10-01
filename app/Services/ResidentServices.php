<?php
namespace App\Services;

use App\Models\IncidentAlert;
use App\Models\Resident;

class ResidentServices {
    protected $incidentAlertModel;
    protected $residentModel;

    function __construct(IncidentAlert $incidentAlertModel, Resident $residentModel)
    {
        $this->incidentAlertModel = $incidentAlertModel;
        $this->residentModel = $residentModel;
    }


    public function MyReportedIncidents(int $residentID) {
        $resident = $this->residentModel->find($residentID);


        return $resident->incidents;
    }
}