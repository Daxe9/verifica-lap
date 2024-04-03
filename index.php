<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . "/controllers/TorneoController.php";
require_once __DIR__ . "/controllers/SquadraController.php";

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});
$app->get("/torneo/{codice}", "TorneoController:getOne");
$app->get("/torneo/{codice}/concluso", "TorneoController:isEnded");
$app->get("/torneo/{codice}/classifica", "TorneoController:getClassifica");
$app->get("/torneo/{codice}/partite", "TorneoController:getPartite");
$app->get("/torneo/{codice}/partite/disputate", "TorneoController:getPartiteDisputate");
$app->get("/torneo/{codice}/partite/da_disputare", "TorneoController:getPartiteDaDisputare");
$app->get("/torneo/{codice}/partite/{id_partita}", "TorneoController:getOnePartita");

$app->get("/squadre", "SquadraController:getAll");
$app->get("/squadre/{id}", "SquadraController:getOne");

$app->run();
