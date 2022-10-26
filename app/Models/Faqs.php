<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faqs extends Model
{
    use HasFactory, SoftDeletes;

    const TABLENAME = "faqs";

    const FIELD_ID = "id";
    const FIELD_QUESTION = "question";
    const FIELD_ANSWER = "answer";
    const FIELD_ORDER = "order";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::FIELD_QUESTION,
        self::FIELD_ANSWER,
        self::FIELD_ORDER
    ];
}
