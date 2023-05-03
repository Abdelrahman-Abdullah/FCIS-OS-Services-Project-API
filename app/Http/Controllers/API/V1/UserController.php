<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UpdateUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Http\Resources\V1\WorkersResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return WorkersResource::collection(
            User::filter(request(['name', 'email', 'role', 'phone', 'jobs']))
                ->with('workerOrders' , 'jobPhotos')
                ->get()
        );
    }
    public function show()
    {
        if (auth()->user()->type == 'worker'):
             return new WorkersResource(
                 auth()->user()
                     ->loadMissing('workerOrders' , 'jobPhotos')
             );
        else:
             return new UserResource(
                 auth()->user()
                     ->loadMissing('orders')
             );
        endif;

    }
    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return response(['message' => 'Logged Out'] ,200);
    }
    public function update(UpdateUserRequest $request){
        auth()->user()->update($request->all());
        return response(['message' => 'Your Account Updated Successfully!'] , 200);
    }
    public function destroy(){
        auth()->user()->delete();
    }
}
