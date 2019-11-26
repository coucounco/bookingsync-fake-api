<?php

namespace App\Http\Controllers;

use App\Http\Resources\V3\RentalResource;
use App\Models\Rental;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;

class SendWebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        $entity = $request->entity;
        $event = $request->event;

        if( config('fakeapi.webhook_url') == null   || empty(config('fakeapi.webhook_url')) ||
            config('fakeapi.secret') == null        || empty(config('fakeapi.secret')))
        {
            return response()->json([
                'message' => 'Must set webhook_url and secret to send webhook'
            ], 500);
        }

        $object = null;
        switch($event) {
            case 'rental_created' :
                $rental = factory(Rental::class)->create();
                $object = new RentalResource($rental);
                break;
            case 'rental_updated' :
                $rental = Rental::inRandomOrder()->first();
                $object = new RentalResource($rental);
                break;
            case 'rental_destroyed' :
                $rental = Rental::inRandomOrder()->first();
                $rental->delete();
                $object = new RentalResource($rental);
                break;
        }

        if(isset($object)) {

            $payload = [
                'account_id' => 1111,
                'event' => $event,
                'resource' => [
                    'links' => [],
                    $entity => $object
                ]
            ];

            $response = null;
            try {
                $client = new Client();
                $response = $client->request('POST', config('fakeapi.webhook_url'), [
                    //'debug' => true,
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'X-Content-Signature' => 'fake',
                    ],
                    'body' => json_encode($payload)
                ]);

                return response()->json([
                    'status' => $response->getStatusCode(),
                    'content' => $response->getBody(),
                    'payload' => json_encode($payload, JSON_PRETTY_PRINT)
                ]);
            }
            catch(BadResponseException $e) {
                return response()->json([
                    'message' => $e->getMessage()
                ], 500);
            }


        }
    }
}
