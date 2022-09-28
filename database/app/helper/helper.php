<?php 

function UploadImage($path,$file)
{
    $imageName = rand(9999,10000).time().'.'.$file->getClientOriginalExtension();
    $file->move(base_path().'/public'.$path,$imageName);
    return $path.'/'.$imageName;
}

?>