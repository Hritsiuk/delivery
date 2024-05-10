<?php

namespace App\Http\Controllers\Api;

use App\DeliveryServices\DeliveryService;
use App\Drivers\NovaPoshta;
use App\Drivers\UrkPoshta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'sender' => ['required', 'string'],
            'delivery_driver' => ['required', 'string'],
            'product' => ['required', 'string'],
        ]);

        $drivers = [
            'ukr' => UrkPoshta::class,
            'nova' => NovaPoshta::class,
        ];

        try {
            $driver = new $drivers[$data['delivery_driver']]();

            $message = $driver->send($data['sender'], $data['product']);
            
            return response()->json([
                'message' => $message,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'driver not found',
            ], 429);
        }
    }
}
