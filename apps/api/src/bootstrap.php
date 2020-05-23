<?php

use ITS\Application\ViewTicketCommand;
use ITS\Application\ViewTicketCommandHandler;
use ITS\Infrastructure\FakeTicketRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../../../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/ticket/{id}', function (Request $request, Response $response, $args) {
    $ticketRepository = new FakeTicketRepository;
    $commandHandler = new ViewTicketCommandHandler($ticketRepository);
    $ticket = $commandHandler->handle(new ViewTicketCommand($args['id']));

    $response->getBody()->write($ticket->description());
    return $response;
});

$app->run();
