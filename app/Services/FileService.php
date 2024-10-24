<?php

namespace App\Services;
use Storage;
use Illuminate\Http\Request;

class FileService{


    public static function storeImage(Request $request,$path){
            try{
                $file_path = Storage::disk('public')->put($path, $request->file('image'));
                return  env('APP_URL')."/storage/".$file_path;
            }catch(\Exception $e){
                dd($e);
                return false;
            }
    }

    public static function deleteImage($image){
        try{
            Storage::delete($image);
            return true;
        }catch(\Exception $e){
            dd($e);
            return false;
        }
    }

}
