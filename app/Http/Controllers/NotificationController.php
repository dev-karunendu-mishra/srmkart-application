<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class NotificationController extends Controller
{
    public function streamOrders()
    {
        // Create a StreamedResponse for SSE
        $response = new StreamedResponse(function () {
            // Listen for the 'OrderCreated' event only when it is triggered
            // This will stream SSE when an order is created
            \Event::listen(OrderCreated::class, function ($event) {
                // Send the order data as an SSE message
                echo "data: " . json_encode($event->order) . "\n\n";
                ob_flush();
                flush();
            });

        });

        // Set appropriate headers for SSE
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');
        $response->headers->set('Transfer-Encoding', 'chunked');
        
        return $response;
    }
}
