<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function __construct()
    {
    	return $this->middleware('auth');
    }

    protected function privilege_validator($filename)
    {
    	$user = auth()->user();
    	if($user->user_role === 3) return 1;

    	
    }

    public function downloader($reg_num, $filename)
    {
    	if($this->privilege_validator($filename))
    	{
	    	$path = public_path('storage/uploads/').$reg_num.'/'.$filename;
	        return response()->download($path);
    	}
    }
}
