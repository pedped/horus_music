<?php

namespace App\Factory;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class JsonResponseFactory
{
    public function __construct(private SerializerInterface $serializer)
    {
    }

    public function create($data, int $status = 200, array $headers = []): Response
    {
        $response = new Response();

        $response->setContent(json_encode($data));
        $response->setStatusCode(Response::HTTP_OK);

        // sets a HTTP response header
        $response->headers->set('Content-Type', 'application/json ');


        return $response;
    }
}