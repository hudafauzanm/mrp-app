<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function __construct()
    {
    	return $this->middleware('auth');
    }

    public function downloader($reg_num, $no_dokumen)
    {
    	$path = public_path('storage/uploads/').$reg_num.'/'.$no_dokumen.'.pdf';

        return response()->download($path);
    }
}
