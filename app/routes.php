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

    'produitsTypes' => [
    'url'        => '/produitsTypes',
    'controller' => 'ProduitTypeController',
    'action'     => 'ProduitTypeAction',
    ],

    'produitTypeCreate'       => [
        'url'        => '/produit-type/create',
        'controller' => 'ProduitTypeController',
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

    'showProduit'    => [
        'url'        => '/produit',
        'controller' => 'ProduitController',
        'action'     => 'readAction',
    ],
    
    
    'showProduitType' => [
    'url'        => '/produitType',
    'controller' => 'ProduitTypeController',
    'action'     => 'readAction',
    ],

    'updateProduitType' => [
    'url'        => '/produitType/update',
    'controller' => 'ProduitTypeController',
    'action'     => 'updateAction',
    ],

    'deleteProduitType' => [
        'url'        => '/produitType/delete',
        'controller' => 'ProduitTypeController',
        'action'     => 'deleteAction',
    ],

    'listContact'       => [
        'url'        => '/Contact/list',
        'controller' => 'ContactController',
        'action'     => 'listAction',
    ],

    'incription' => [
    'url'        => '/register',
    'controller' => 'UserController',
    'action'     => 'registerAction',
    ],

    'login' => [
    'url'        => '/login',
    'controller' => 'UserController',
    'action'     => 'loginAction',
    ],
    
    'updateUser' => [
        'url'        => '/user/update',
        'controller' => 'UserController',
        'action'     => 'updateAction',
    ],

    'profilUser' => [
        'url'        => '/user/profil',
        'controller' => 'UserController',
        'action'     => 'showUserAction',
    ],
    
    'userLogout' => [
    'url'        => '/user/logout',
    'controller' => 'UserController',
    'action'     => 'userLogoutAction',
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