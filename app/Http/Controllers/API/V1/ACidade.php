<?php
namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\Request;

class ACidade{

    public function getHistory(Request $request){
        return \App\Models\Historium::first();
    }
}



