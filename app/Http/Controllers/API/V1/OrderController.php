<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\OrderResource;
use App\Models\Order;
use Illuminate\Validation\Rule;
use function Symfony\Component\String\u;

class OrderController extends Controller
{

    public function store()
    {
        request()->validate([
            'workerId' => ['required' , 'numeric' , Rule::exists('users' , 'id')]
        ]);
        auth()->user()->orders()->create([
            'worker_id' => request()->workerId,
            'status'    => 'P'
        ]);
        return response([
            'message' => 'Order Has Been Sent',
        ],201);
    }
    public function update(Order $order)
    {
        request()->validate([
            'status' => ['required' , Rule::in('P' , 'R' , 'A')]
        ]);
        auth()->user()->workerOrders()
            ->where('id' , $order->id)
            ->update([
            'status'  => request()->status
        ]);

        return response([
            'message' => 'Order Has Been Updated',
        ],200);
    }
    public function delete(Order $order){
        $order->delete();
        return response([
            'message' => 'Order Has Been Canceled',
        ],200);
    }
}
