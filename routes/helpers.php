<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

function store_asset($path, $file)
{
    return str_replace('public/', '', Storage::putFile('public/' . $path, new File(public_path('storage/'.$file))));
}


