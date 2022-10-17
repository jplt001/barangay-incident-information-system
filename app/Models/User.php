<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, \OwenIt\Auditing\Auditable, HasApiTokens;

    // TABLE NAME
    const TABLENAME = "users";

    // FIELDS/COLUMNS
    const FIELD_ID = "id";
    const FIELD_FIRST_NAME = "first_name";
    const FIELD_MIDDLE_NAME = "middle_name";
    const FIELD_LAST_NAME = "last_name";
    const FIELD_EMAIL = "email";
    const FIELD_PASSWORD = "password";
    const FIELD_CONTACT_NUMBER = "contact_number";
    const FIELD_INCASE_OF_EMERGENCY = "incase_of_emergency";
    const FIELD_INCASE_OF_EMERGENCY_MOBN_NUM = "incase_of_emergency_mobile_number";
    const FIELD_POSITION_ID = "position_id";
    const FIELD_USER_TYPE = "user_type";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::FIELD_FIRST_NAME,
        self::FIELD_MIDDLE_NAME,
        self::FIELD_LAST_NAME,
        self::FIELD_EMAIL,
        self::FIELD_PASSWORD,
        self::FIELD_CONTACT_NUMBER,
        self::FIELD_INCASE_OF_EMERGENCY,
        self::FIELD_INCASE_OF_EMERGENCY_MOBN_NUM,
        self::FIELD_POSITION_ID,
        self::FIELD_USER_TYPE,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function position() {
        return $this->hasOne(Positions::class, Positions::FIELD_ID, self::FIELD_POSITION_ID);
    }
}
