<?php
use App\Controller\ClienteController;

$routes = [
    'GET' => [
        '' => function() {
            require 'src/controller/ClienteController.php';
            $controller = new ClienteController();
            $controller->index();
        },
        'listar' => function() {
            require 'src/controller/ClienteController.php';
            $controller = new ClienteController();
            $controller->listar();
        },
        'cliente/visualizar/{id}' => function($params) {
            require 'src/controller/ClienteController.php';
            $controller = new ClienteController();
            $controller->visualizar($params['id']);
        },
    ],

    'POST' => [
        'cliente/inserir' => function() {
            require 'src/controller/ClienteController.php';
            $controller = new ClienteController();
            $controller->inserir();
        },
    ],

    'PUT' => [
        'cliente/editar/{id}' => function($params) {
            require 'src/controller/ClienteController.php';
            $controller = new ClienteController();
            $controller->editar($params['id']);
        },
    ],

    'DELETE' => [
        'cliente/remover/{id}' => function($params) {
            require 'src/controller/ClienteController.php';
            $controller = new ClienteController();
            $controller->remover($params['id']);
        },
    ],
];