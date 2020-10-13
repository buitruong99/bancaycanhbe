<?php
namespace App\Traits;

use Storage;
use App\Http\Requests\SliderAddRequest;
use Illuminate\Support\Str;

trait StoragelmageTrait{
    public function storagelTraitUploat($request,$fieldName,$foderName){
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
                $fileNameHash = str_random(20) .'.'. $file->getClientOriginalExtension();
            $filepath = $request->file($fieldName)->storeAs('public/' . $foderName . '/' . auth()->id(), $fileNameHash);
            $dataUploatTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filepath)

            ];
            return $dataUploatTrait;
        }
        return null;
    }
    public function storagelTraitUploatMutiple($file,$foderName){

            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
            $filepath = $file->storeAs('public/' . $foderName . '/' . auth()->id(), $fileNameHash);
            $dataUploatTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filepath)

            ];
            return $dataUploatTrait;

    }
}

