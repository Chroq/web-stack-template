<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpClient\HttpClient;


class HandshakeController
{

    /**
     * @Route("/handshake", name="get_handshake", methods={"GET"})
     */
    public function handshake(Request $request): JsonResponse
    {
        return new JsonResponse(['status' => 'Symfony REST API is up and running.'], Response::HTTP_OK);
    }


    /**
     * @Route("/handshake/go", name="get_go_handshake", methods={"GET"})
     */
    public function goHandshake(Request $request): JsonResponse
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://go:8081/');

        if($response->getStatusCode() === 200){
            $status = 'Go Web Service is up and running.';
        }else{
            $status = 'Go Web Service is not reachable. Status code : ' . $response->getStatusCode();
        }

        return new JsonResponse(['status' => $status ], Response::HTTP_OK);
    }
}
