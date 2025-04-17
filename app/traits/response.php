<?php

namespace app\trait;

trait Response
{
    public function Send($response, array $data, int $statusCode = 200)
    {
        $response->getBody()->write(json_encode($data, JSON_UNESCAPED_UNICODE));
        return $response
            ->withStatus($statusCode)
            ->withHeader('Content-type', 'application/json');
    }
}