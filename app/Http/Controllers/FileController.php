<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\FilesTrait;

class FileController extends Controller
{
    use FilesTrait;

    public function index($path) {
    	$file = $this->display($path,true);
    	return $file;
    }
}
