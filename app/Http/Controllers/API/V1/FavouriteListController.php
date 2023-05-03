<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\FavouriteResource;
use App\Models\FavouriteList;
use Illuminate\Validation\Rule;

class FavouriteListController extends Controller
{
    public function index()
    {
        return FavouriteResource::collection(auth()->user()->favourites);
    }
    public function store()
    {
        request()->validate([
            'workerId' => ['required' , 'numeric' , Rule::exists('users','id')]
        ]);
        auth()->user()->favourites()->create([
            'worker_id' => request()->workerId
        ]);
        return response([
            'message' => 'Added To Yor Favourite Successfully'
        ],201);
    }
    public function destroy(FavouriteList $favouriteList)
    {
        auth()->user()->favourites()
            ->where('id' ,$favouriteList->id)
            ->delete();
        return response(['message' => 'Deleted'],200);
    }
}
