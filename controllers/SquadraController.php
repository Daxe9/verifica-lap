<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . "/../entities/Gioco.php";

class SquadraController {

    public function getAll(Request $request, Response $response, $args) {
        $gioco = new Gioco();

        $response->getBody()->write(json_encode($gioco->getAllSquadre()));

        return $response->withHeader("content-type", "application/json");
    }


    public function getOne(Request $request, Response $response, $args) {
        $gioco = new Gioco();

        $squadra = $gioco->getOneSquadra($args["id"]);
        if (is_null($squadra)){
            return $response->withStatus(404);
        }

        $response->getBody()->write(json_encode($squadra));
        return $response->withHeader("content-type", "application/json");
    }
}