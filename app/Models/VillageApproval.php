<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageApproval extends Model
{
    protected $table ="villageapplication";




     // OnetoOne relationship inverse
     public function UserApplicant()
    {
        return $this->belongsTo(Users::class, 'applicant_id');
    }


    // OnetoMany relationship inverse
    public function UserCoordinator()
    {
        return $this->belongsTo(Users::class, 'coordinator_id');
    }


    // One Village application can be sent in one cell  (OnetoOne)
    public function Cell(){
        return $this->hasOne(CellApproval::class);
    }

}
