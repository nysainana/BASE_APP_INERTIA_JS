<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Societe extends Model
{
    use HasFactory, SoftDeletes;

//    protected $guarded = [];

    protected $fillable = [
        "name",
        "tel",
        "address",
        "city",
        "mail",
        "text_ticket",
        "logo"
    ];

}
