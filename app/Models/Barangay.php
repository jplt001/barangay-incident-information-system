<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barangay extends Model
{
    use HasFactory, SoftDeletes;

    const TABLENAME = "barangays";

    const FIELD_NAME = "name";
    const FIELD_ADDRESS1 = "address1";
    const FIELD_ADDRESS2 = "address2";
    const FIELD_CONTACT_NUMBER = "contact_number";
    const FIELD_LANDLINE_NUMBER = "landline_number";
    const FIELD_LATITUDE = "latitude";
    const FIELD_LONGITUDE = "longitude";
    const FIELD_LOGO = "logo";
    const FIELD_SETUP_FINISHED = "setup_finished";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::FIELD_NAME,
        self::FIELD_ADDRESS1,
        self::FIELD_ADDRESS2,
        self::FIELD_CONTACT_NUMBER,
        self::FIELD_LANDLINE_NUMBER,
        self::FIELD_LATITUDE,
        self::FIELD_LONGITUDE,
        self::FIELD_LOGO,
        self::FIELD_SETUP_FINISHED,
    ];
}
