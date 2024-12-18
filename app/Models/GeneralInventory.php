<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInventory extends Model
{
    use HasFactory;
    protected $guarded = [] ;
    public function newFranchise()
    {
        return $this->belongsTo(NewFranchise::class, 'new_franchise_id');
    }
}
