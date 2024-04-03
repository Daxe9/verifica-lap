<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . "/../entities/Gioco.php";

class TorneoController {
    public function getOne(Request $request, Response $response, array $args) {
        $gioco = new Gioco();
        $codice = $args["codice"]; 

        $torneo = $gioco->getOneTorneo($codice);
        if (is_null($torneo)){
            return $response->withStatus(404);
        }

        $response->getBody()->write(json_encode($torneo));

        return $response->withHeader("content-type", "application/json");
    }

    public function getPartite(Request $request, Response $response, array $args) {
        $gioco = new Gioco();
        $torneo = $gioco->getOneTorneo($args["codice"]);
        if (is_null($torneo)){
            return $response->withStatus(404);
        }

        $partite = $torneo->getPartite();
        $response->getBody()->write(json_encode($partite));
        return $response->withHeader("Content-Type", "application/json");
    }

    public function getOnePartita(Request $request, Response $response, array $args) {
        $gioco = new Gioco();
        $torneo = $gioco->getOneTorneo($args["codice"]);
        if (is_null($torneo)){
            return $response->withStatus(404);
        }

        $id_partita = $args["id_partita"];
        $partita = $torneo->getOnePartita($id_partita);
        if (is_null($partita)){
            return $response->withStatus(404);
        }

        $response->getBody()->write(json_encode($partita));
        return $response->withHeader("Content-Type", "application/json");
    }


    public function getPartiteDisputate(Request $request, Response $response, array $args) {
        $gioco = new Gioco();
        $torneo = $gioco->getOneTorneo($args["codice"]);
        if (is_null($torneo)){
            return $response->withStatus(404);
        }

        $partite = $torneo->getPartiteDisputate();
        $response->getBody()->write(json_encode($partite));
        return $response->withHeader("Content-Type", "application/json");
    }
    
    public function getPartiteDaDisputare(Request $request, Response $response, array $args) {
        $gioco = new Gioco();
        $torneo = $gioco->getOneTorneo($args["codice"]);
        if (is_null($torneo)){
            return $response->withStatus(404);
        }

        $partite = $torneo->getPartiteDaDisputare();
        $response->getBody()->write(json_encode($partite));
        return $response->withHeader("Content-Type", "application/json");
    }

    public function isEnded(Request $request, Response $response, array $args) {
        $gioco = new Gioco();
        $torneo = $gioco->getOneTorneo($args["codice"]);
        if (is_null($torneo)){
            return $response->withStatus(404);
        }

        $response->getBody()->write(json_encode(array("concluso" => $torneo->isEnded())));

        return $response->withHeader("Content-Type", "application/json");
    }

    public function getClassifica(Request $request, Response $response, array $args) {
        $gioco = new Gioco();
        $torneo = $gioco->getOneTorneo($args["codice"]);
        if (is_null($torneo)){
            return $response->withStatus(404);
        }

        if (!$torneo->isEnded()){
            $response->getBody()->write(json_encode(array(
                "messaggio" => "Il torneo non è ancora concluso"
            )));
            return $response->withHeader("Content-Type", "application/json");
        }

        $response->getBody()->write(json_encode($torneo->getClassifica()));

        return $response->withHeader("Content-Type", "application/json");
    }
}