<?php

namespace App\Http\Controllers;

use App\Models\CellApproval;
use App\Models\SectorApproval;
use App\Models\Users;
use App\Models\VillageApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Functions extends Controller
{

   public function completeApplication(){

    // Querry to join users , Village ,cell and sector for complet process
    // (when application reached in sector table)
    $data = DB::table('users')
        ->join('villageapplication', 'users.id', '=', 'villageapplication.applicant_id')
        ->join('cellapplication', 'villageapplication.id', '=', 'cellapplication.village_id')
        ->join('sectorapplication', 'cellapplication.id', '=', 'sectorapplication.cell_id')
        ->select('users.name', 'villageapplication.reason', 'cellapplication.approval_status', 'sectorapplication.feeback')
        -> get();
    return $data;
   }


    public function VillageApplication($adminVillage){
        // Querry to join users , Village
        $data = DB::table('users')
            ->join('villageapplication', 'users.id', '=', 'villageapplication.applicant_id')
            ->select('users.*','villageapplication.reason','villageapplication.id as vid','villageapplication.landcertificate','villageapplication.blueprint', 'villageapplication.approval_status as vapproval','villageapplication.created_at as vtime')
            ->where('users.village', $adminVillage)
            ->paginate(4);
        return $data;
    }


    public function CellApplication($adminCell){
        // Querry to join users , Village ,cell
        $data = DB::table('users')
            ->join('villageapplication', 'users.id', '=', 'villageapplication.applicant_id')
            ->join('cellapplication', 'villageapplication.id', '=', 'cellapplication.village_id')
            ->select('users.*', 'villageapplication.*','cellapplication.id as cid', 'cellapplication.approval_status as capproval','cellapplication.created_at as ctime')
            ->where('users.cell', $adminCell)
            -> paginate(4);
        return $data;
    }


    public function SectorApplication($adminSector){
        // Querry to join users , Village ,cell and sector for complet process
        // (when application reached in sector table)
        $data = DB::table('users')
            ->join('villageapplication', 'users.id', '=', 'villageapplication.applicant_id')
            ->join('cellapplication', 'villageapplication.id', '=', 'cellapplication.village_id')
            ->join('sectorapplication', 'cellapplication.id', '=', 'sectorapplication.cell_id')
            ->select('users.*', 'villageapplication.*', 'cellapplication.*','sectorapplication.id as sid','sectorapplication.feeback as scomment', 'sectorapplication.approval_status as sapproval','sectorapplication.created_at as stime')
            ->where('users.sector', $adminSector)
            -> paginate(4);
        return $data;
    }

//
  public function uvFunction($userid){

      // Jonins Users and Village
      $uvillage = VillageApproval::with('UserApplicant')
          -> where("applicant_id",$userid)
          -> where("approval_status",'pending')
          -> paginate(4);
      return $uvillage;
  }

    public function uvcFunction($id){

        // joins user ,Village and cell
        $uvcell = CellApproval::with('Village.UserApplicant')
            ->whereHas('Village.UserApplicant', function($query) use ($id){
                $query->where('applicant_id', $id);
            })
        -> get();
          return $uvcell;
  }


    public function uvcsFunction($id){
        // joins users , village ,cell and  sector
        $uvcsector = SectorApproval::with('Cell.Village.UserApplicant')
            ->whereHas('Cell.Village.UserApplicant', function($query) use ($id){
                $query->where('applicant_id', $id);
            })
            -> get();
        return $uvcsector;

    }

}
