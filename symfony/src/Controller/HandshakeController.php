<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

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
        return new JsonResponse(['status' => 'Go Web Service is up and running.'], Response::HTTP_OK);
    }
}
