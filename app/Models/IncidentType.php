<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentType extends Model
{
    use HasFactory;

    const TABLENAME = "incident_types";

    const FIELD_ID = "id";
    const FIELD_NAME = "name";
    const FIELD_DESCRIPTION = "description";
    const FIELD_ACTIVE = "active";

    protected $fillable = [
        self::FIELD_ID,
        self::FIELD_NAME,
        self::FIELD_DESCRIPTION,
        self::FIELD_ACTIVE,
    ];
}
