<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function __construct()
    {
    	return $this->middleware('auth');
    }

    public function downloader($reg_num, $filename)
    {
    	$path = public_path('storage/uploads/').$reg_num.'/'.$filename;
        return response()->download($path);
    }
}
