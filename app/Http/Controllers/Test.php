<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function Test(){

        $functions  = new Functions();

        $mytest = $functions ->uvcsFunction();

        return  $mytest;
    }
}
