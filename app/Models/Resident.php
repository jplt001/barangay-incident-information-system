<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Resident extends Authenticatable implements Auditable, JWTSubject
{
    use HasFactory, SoftDeletes, \OwenIt\Auditing\Auditable, HasApiTokens;

    const TABLENAME = "residents";

    const FIELD_FIRST_NAME = "first_name";
    const FIELD_MIDDLE_NAME = "middle_name";
    const FIELD_LAST_NAME = "last_name";
    const FIELD_EMAIL = "email";
    const FIELD_CONTACT_NUMBER = "contact_number";
    const FIELD_GENDER = "gender";
    const FIELD_BIRTHDATE = "birthdate";
    const FIELD_ADDRESS1 = "address1";
    const FIELD_ADDRESS2 = "address2";
    const FIELD_PROFILE_PICTURE = "profile_picture";
    const FIELD_ENABLED = "enabled";
    const FIELD_IS_4PS_MEMBER = "is_4ps_member";
    const FIELD_IS_4PS_MEMBER_AT = "4ps_member_at";

    protected $fillable = [
        self::FIELD_FIRST_NAME,
        self::FIELD_MIDDLE_NAME,
        self::FIELD_LAST_NAME,
        self::FIELD_CONTACT_NUMBER,
        self::FIELD_ADDRESS1,
        self::FIELD_ADDRESS2,
        self::FIELD_PROFILE_PICTURE,
        self::FIELD_ENABLED,
        self::FIELD_IS_4PS_MEMBER,
        self::FIELD_IS_4PS_MEMBER_AT,
        self::FIELD_EMAIL,
        self::FIELD_BIRTHDATE,
        self::FIELD_GENDER,
    ];


    public function incidents() {
        return $this->hasMany(IncidentAlert::class, IncidentAlert::FIELD_RESIDENT_ID, "id");
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
