<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
protected $table ="users";

    // one village coordinator can approve many village applications (OnetoMany)
    public function VillageCoord(){
        return $this->hasMany(VillageApproval::class);
    }

    // one village Applicant can have more than one applications in village (OnetoMany)
    public function VillageApplicant(){
        return $this->hasMany(VillageApproval::class);
    }

    // one cell coordinator can approve many cell applications (OnetoMany)
    public function CellCoord(){
        return $this->hasMany(CellApproval::class);
    }

    // OnetoMany
    public function SectorCoord(){
        return $this->hasMany(SectorApproval::class);
    }

//    // OnetoMany
//    public function Sector(){
//        return $this->hasOne(SectorApproval::class);
//    }
}
