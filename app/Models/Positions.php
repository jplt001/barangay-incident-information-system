<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Positions extends Model
{
    use HasFactory, SoftDeletes;

    const TABLLENAME = "positions";

    const FIELD_ID = "id";
    const FIELD_NAME = "name";
    const FIELD_DESCRIPTION = "description";
    const FIELD_ACTIVE = "active";
    const FIELD_ICON = "icon";
    const FIELD_LEVEL = "level";

    protected $fillable = [
        self::FIELD_NAME,
        self::FIELD_DESCRIPTION,
        self::FIELD_ACTIVE,
        self::FIELD_ICON,
        self::FIELD_LEVEL,
    ];
}
