<?php 

function UploadImage($path,$file)
{
    // get file name withou extension
    $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    $imageName = $filename.rand(1000,99999).time().'.'.$file->getClientOriginalExtension();
    $file->move(base_path().'/public'.$path,$imageName);
    // dd($imageName);
    return $path.'/'.$imageName;
}

?>