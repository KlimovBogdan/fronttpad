<?php

namespace App\Http\Controllers\Send;

use App\Api\Frontpad\Connection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Send\SendCallbackRequest;
use App\Http\Requests\Send\SendOrderRequest;

class SendController extends Controller {

    public function callback(SendCallbackRequest $request) {
        /**
         * @var Connection $connection
         */
        $connection = app('api.frontpad');

        $response = $connection->call('/api/index.php?new_order', $request->validated());

        if ($response->getStatusCode() !== 200) {
            return [
                'errors' => [
                    $response->getStatusCode() => [$response->getReasonPhrase()],
                ],
            ];
        }

        return [
            'success' => $response->getReasonPhrase(),
        ];
    }

    public function order(SendOrderRequest $request) {
        //
    }

}
