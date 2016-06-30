<?php
$routes = [
    'index'       => [
        'url'        => '/index',
        'controller' => 'HomeController',
        'action'     => 'indexAction',
    ],
    'Contact'       => [
        'url'        => '/Contact',
        'controller' => 'ContactController',
        'action'     => 'contactAction',
    ],

    'createProduit'       => [
    'url'        => '/produit/create',
    'controller' => 'ProduitController',
    'action'     => 'createAction',
    ],

    'listProduits'       => [
        'url'        => '/produits',
        'controller' => 'ProduitController',
        'action'     => 'produitsAction',
    ],

    'deleteProduit'      => [
        'url'        => '/delete/produit',
        'controller' => 'ProduitController',
        'action'     => 'deleteAction',
    ],

    'updateProduit'      => [
        'url'        => '/update/produit',
        'controller' => 'ProduitController',
        'action'     => 'updateAction',
    ],

    'showProduit'      => [
        'url'        => '/produit',
        'controller' => 'ProduitController',
        'action'     => 'readAction',
    ],

    'listContact'       => [
        'url'        => '/Contact/list',
        'controller' => 'ContactController',
        'action'     => 'listAction',
    ],

    'wiki'        => [
        'url'        => '/wiki',
        'controller' => 'HomeController',
        'action'     => 'wikiAction',
    ],
    'articles'         => [
        'url'        => '/articles',
        'controller' => 'HomeController',
        'action'     => 'articlesAction',
    ],
    'delete'      => [
        'url'        => '/delete',
        'controller' => 'HomeController',
        'action'     => 'deleteAction',
    ],
    '404'         => [
        'url'        => '/404',
        'controller' => 'SecurityController',
        'action'     => '404Action',
    ],
];