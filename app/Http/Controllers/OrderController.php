<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Request\CreateSessionRequest;
use App\Request\GetInformationRequest;
use App\Services\WebcheckoutService;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

//        dd($request);

        $order = new Order();
        $order->user_id = auth()->id();
        $order->total_amount = 50000;
        $order->expiration = date('c', strtotime('+2 days'));
        $order->save();

//        var_dump($order->attributesToArray(), date('c', strtotime('+2 days')));
//        dd($order);

        $data = [
            'payment' => [
                'reference' => $order->id,
                'description' => 'conexion con webcheckout desde un test',
                'amount' => [
                    'currency' => 'COP',
                    'total' => $order->total_amount,
                ]
            ],
            'returnUrl' => route('home'),
            'expiration' => $order->expiration,
        ];

//        var_dump($data);
//        dd($data);

        $response = (new WebcheckoutService())->createSession($data);
//        dd($response);

        $order->session_id = $response['requestId'];
        $order->process_url = $response['processUrl'];

        $response = (new WebcheckoutService())->getInformation($order->session_id);
//        dd($response);

        $order->status = $response['status']['status'];

//        dd($order);
        return Order::find($order->id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);

        $order = new Order();
        $order->user_id = auth()->id();
        $order->total_amount = 10000;
        $order->expiration = date('c', strtotime('+2 days'));
        $order->save();

//        var_dump($order->attributesToArray(), date('c', strtotime('+2 days')));
//        dd($order);

        $data = [
            'payment' => [
                'reference' => strval($order->id),
                'description' => 'conexion con webcheckout desde un test',
                'amount' => [
                    'currency' => 'COP',
                    'total' => number_format($order->total_amount),
//                    'total2' => '10000',
                ]
            ],
            'returnUrl' => route('home'),
            'expiration' => $order->expiration,
        ];

//        var_dump($data);
//        dd($data);

        $response = (new WebcheckoutService())->createSession($data);
        dd($response);

        $order->session_id = $response['requestId'];
        $order->process_url = $response['processUrl'];

        $response = (new WebcheckoutService())->getInformation($order->session_id);
        dd($response);

        $order->status = $response['status']['status'];

//        $user = auth()->user();

//        dd($user);
//        return Order::where('user_id', auth()->id())->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
