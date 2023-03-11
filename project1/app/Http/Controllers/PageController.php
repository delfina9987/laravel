<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($drive)
    {
        $drives = match($drive)
        {
            "fdd" => "Dyskietka",
            "hdd" => "Dysk twardy",
            "ssd" => "Dysk SSD",
            default => "błędna wartość"
        };
        /*[
            "fdd" => "Dyskietka",
            "hdd" => "Dysk twardy",
            "ssd" => "Dysk SSD",
            "default" => "błędna wartość"
        ];*/
        //return $drives[$drive];
        return $drives;
    }
}
