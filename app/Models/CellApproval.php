<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CellApproval extends Model
{
    protected $table ="cellapplication";



    // OnetoOne relationship inverse
    public function Village()
    {
    return $this->belongsTo(VillageApproval::class, 'village_id');
    }

    // OnetoMany relationship inverse
    public function CellCoord()
    {
    return $this->belongsTo(Users::class, 'coordinator_id');
    }


    // One Cell application can be sent in one sector  (OnetoOne)
    public function Sector(){
        return $this->hasOne(SectorApproval::class);
    }

}
