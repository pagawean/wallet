<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImagesTrait;
use Image;

class ImageController extends Controller
{
    use ImagesTrait;

	public function index($path) {
		$img = $this->display($path,true);
        return $img;
	}
}
