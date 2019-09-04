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
            ->select('users.*', 'villageapplication.approval_status as vapproval','villageapplication.created_at as vtime')
            ->where('users.village', $adminVillage)
            ->paginate(6);
        return $data;
    }


    public function CellApplication($adminCell){
        // Querry to join users , Village ,cell
        $data = DB::table('users')
            ->join('villageapplication', 'users.id', '=', 'villageapplication.applicant_id')
            ->join('cellapplication', 'villageapplication.id', '=', 'cellapplication.village_id')
            ->select('users.*', 'villageapplication.*', 'cellapplication.approval_status as capproval','cellapplication.created_at as ctime')
            ->where('users.cell', $adminCell)
            -> paginate(6);
        return $data;
    }


    public function SectorApplication($adminSector){
        // Querry to join users , Village ,cell and sector for complet process
        // (when application reached in sector table)
        $data = DB::table('users')
            ->join('villageapplication', 'users.id', '=', 'villageapplication.applicant_id')
            ->join('cellapplication', 'villageapplication.id', '=', 'cellapplication.village_id')
            ->join('sectorapplication', 'cellapplication.id', '=', 'sectorapplication.cell_id')
            ->select('users.*', 'villageapplication.*', 'cellapplication.*', 'sectorapplication.approval_status as sapproval','sectorapplication.created_at as stime')
            ->where('users.sector', $adminSector)
            -> paginate(8);
        return $data;
    }




    public function globalFunction(){

          // Jonins Users and Village
         $MyFunction = VillageApproval::with('UserApplicant','UserCoordinator')-> get() ;
//        return $MyFunction;

          // joins Village and cell
        $MyFunction2 = CellApproval::with('Village')-> get() ;
     //  return $MyFunction2;

        // joins cell and  sector
        $MyFunction3 = SectorApproval::with('Cell','SectorCoord')->where('approval_status','Active') -> get() ;
       // return $MyFunction3;


        $data = DB::table('users')
            ->join('villageapplication', 'users.id', '=', 'villageapplication.applicant_id')
            ->join('cellapplication', 'villageapplication.id', '=', 'cellapplication.village_id')
            ->join('sectorapplication', 'cellapplication.id', '=', 'sectorapplication.cell_id')
            ->select('users.*', 'villageapplication.*', 'cellapplication.*', 'sectorapplication.approval_status as sapproval','sectorapplication.created_at as stime')
            -> get();
        return $data;

    }

}
