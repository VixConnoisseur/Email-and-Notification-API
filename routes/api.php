<?php

use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
        'service' => 'Notifications API',
        'version' => '1.0.0',
        'timestamp' => now()->toDateTimeString()
    ]);
});

Route::get('/test', function () {
    return response()->json([
        'message' => 'API is working!',
        'endpoints' => [
            'email' => '/api/email/send',
            'sms' => '/api/sms/send',
            'push' => '/api/push/send'
        ]
    ]);
});
