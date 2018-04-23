<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Response;

trait FilesTrait {

	public function display($path, $raw = false) {
		$file = Storage::get($path);

		if ($raw) {
			$filename = basename($path);
			$file_extension = strtolower(substr(strrchr($filename,"."),1));

			switch ($file_extension) {
				case 'mp4':
					$type = 'video/mp4';
				default:
			}

			$response = Response::make($file, 200);
			return $response;
		}

		return $file;
	}

	public function getPath() {

	}

	public function saveFile($path, $file) {
		$save_file = Storage::put($path, (string) $file);
	}
}