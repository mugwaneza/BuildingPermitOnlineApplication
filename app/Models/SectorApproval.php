<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectorApproval extends Model
{
    protected $table ="sectorapplication";

    // OnetoOne relationship inverse
    public function Cell()
    {
    return $this->belongsTo(CellApproval::class, 'cell_id');
    }

    // OnetoMany relationship inverse
    public function SectorCoord()
    {
    return $this->belongsTo(Users::class, 'landmanager_id');
    }


}
