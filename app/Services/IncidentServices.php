<?php
namespace App\Services;

use App\Models\IncidentAlert;

class IncidentServices {
    protected $incidentAlertModel;

    function __construct(IncidentAlert $incidentAlertModel)
    {
        $this->incidentAlertModel = $incidentAlertModel;
    }
}