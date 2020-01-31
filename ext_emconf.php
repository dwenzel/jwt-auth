<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "jwt_auth".
 ***************************************************************/

/** @noinspection PhpUndefinedVariableInspection */
$EM_CONF[$_EXTKEY] = [
    'title' => 'JWT Auth',
    'description' => 'JSON Web Token Middleware for TYPO3 CMS',
    'category' => 'plugin',
    'author' => 'Dirk Wenzel',
    'state' => 'alpha',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '0.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-0.0.0',
        ],
    ],
];
