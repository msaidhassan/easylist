<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function newFranchise()
    {
        return $this->belongsTo(NewFranchise::class, 'new_franchise_id');
    }
}
