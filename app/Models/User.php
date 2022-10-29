<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    const TABLENAME = 'users';

    const FIELD_FIRST_NAME = "first_name";
    const FIELD_LAST_NAME = "last_name";
    const FIELD_MIDDLE_NAME = "middle_name";
    const FIELD_CONTACT_NUMBER = "contact_number";
    const FIELD_EMAIL = "email";
    const FIELD_PASSWORD = "password";
    const FIELD_ROLE = "role";
    const FIELD_BARANGAY_ID = "barangay_id";
    const FIELD_REMEMBER_TOKEN = "remember_token";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::FIELD_FIRST_NAME,
        self::FIELD_LAST_NAME,
        self::FIELD_MIDDLE_NAME,
        self::FIELD_CONTACT_NUMBER,
        self::FIELD_EMAIL,
        self::FIELD_PASSWORD,
        self::FIELD_ROLE,
        self::FIELD_BARANGAY_ID,
        self::FIELD_REMEMBER_TOKEN,
        
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


    public function barangay() {
        return $this->hasOne(Barangay::class, 'id', self::FIELD_BARANGAY_ID);
    }

    public function role() {
        return $this->hasOne(Role::class, "name", self::FIELD_ROLE)->select(["name", "display_name"]);
    }
}
