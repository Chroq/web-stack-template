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
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        return new JsonResponse(['status' => 'Symfony REST API is up and running.'], Response::HTTP_OK);
    }
}