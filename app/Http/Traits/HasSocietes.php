<?php
namespace App\Http\Traits;

use App\Models\Societe;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasSocietes{

    public function societes(): HasMany
    {
        return $this->hasMany(Societe::class);
    }

    public function isConfigured(): bool
    {
        if($this->isAdmin()) return true;
        return $this->societes()->first()->is_configured;
    }

}
