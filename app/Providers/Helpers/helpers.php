<?php
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

function imageUrl($image, $directory, $width = false, $height = false)
{
    if (!is_dir($directory)){
        mkdir($directory,0755, true);
    }
    $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    $imageUrl = $directory.'/'.$imageName;
    Image::make($image)->resize($width,$height)->save($imageUrl);
    return $imageUrl;
}

function genSulg($name, $count = false, $id = false)
{
    if ($count > 1) {
        if ($id) {
            return Str::slug($name . ' ' . $id);
        }
        return Str::slug($name . ' ' . hexdec(uniqid()));
    }
    return Str::slug($name);
}

function genId($table,$field,$length,$prefix)
{
    return IdGenerator::generate(['table'=>$table,'field'=>$field,'length'=>$length,'prefix'=>$prefix]);
}
