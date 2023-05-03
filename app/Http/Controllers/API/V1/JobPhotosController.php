<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

class JobPhotosController extends Controller
{
    public function store()
    {
        request()->validate([
            'file' => ['required' , 'image']
        ]);
        auth()->user()->jobPhotos()
            ->create([
                'file' => request()->file('file')->store()
            ]);
        return response(['message' => 'Photo Uploaded Successfully'] , 200);
    }
}
