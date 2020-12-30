<?php

// This file has been auto-generated by the Symfony Cache Component.

return [[

'App_Entity_Incident' => 0,
'App_Entity_Product' => 1,
'App_Entity_Service' => 2,
'App_Entity_User' => 3,

], [

0 => static function () {
    return \Symfony\Component\VarExporter\Internal\Hydrator::hydrate(
        $o = [
            clone (($p = &\Symfony\Component\VarExporter\Internal\Registry::$prototypes)['Symfony\\Component\\Serializer\\Mapping\\ClassMetadata'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Component\\Serializer\\Mapping\\ClassMetadata')),
            clone ($p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata')),
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
        ],
        null,
        [
            'stdClass' => [
                'name' => [
                    'App\\Entity\\Incident',
                    'id',
                    'name',
                    'information',
                    'state',
                    'gravity',
                    'services',
                    'createdAt',
                    'updatedAt',
                ],
                'attributesMetadata' => [
                    [
                        'id' => $o[1],
                        'name' => $o[2],
                        'information' => $o[3],
                        'state' => $o[4],
                        'gravity' => $o[5],
                        'services' => $o[6],
                        'createdAt' => $o[7],
                        'updatedAt' => $o[8],
                    ],
                ],
                'groups' => [
                    1 => [
                        'incident_read',
                    ],
                    [
                        'incident_read',
                        'incident_post',
                        'incident_update',
                    ],
                    [
                        'incident_read',
                        'incident_post',
                        'incident_update',
                    ],
                    [
                        'incident_read',
                        'incident_post',
                        'incident_update',
                    ],
                    [
                        'incident_read',
                        'incident_post',
                        'incident_update',
                    ],
                    [
                        'incident_read',
                        'incident_post',
                        'incident_update',
                    ],
                    [
                        'incident_read',
                    ],
                    [
                        'incident_read',
                    ],
                ],
            ],
        ],
        $o[0],
        []
    );
},
1 => static function () {
    return \Symfony\Component\VarExporter\Internal\Hydrator::hydrate(
        $o = [
            clone (($p = &\Symfony\Component\VarExporter\Internal\Registry::$prototypes)['Symfony\\Component\\Serializer\\Mapping\\ClassMetadata'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Component\\Serializer\\Mapping\\ClassMetadata')),
            clone ($p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata')),
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
        ],
        null,
        [
            'stdClass' => [
                'name' => [
                    'App\\Entity\\Product',
                    'id',
                    'name',
                    'state',
                    'services',
                    'createdAt',
                    'updatedAt',
                ],
                'attributesMetadata' => [
                    [
                        'id' => $o[1],
                        'name' => $o[2],
                        'state' => $o[3],
                        'services' => $o[4],
                        'createdAt' => $o[5],
                        'updatedAt' => $o[6],
                    ],
                ],
                'groups' => [
                    1 => [
                        'product_read',
                    ],
                    [
                        'product_read',
                        'product_post',
                    ],
                    [
                        'product_read',
                    ],
                    5 => [
                        'product_read',
                    ],
                    [
                        'product_read',
                    ],
                ],
            ],
        ],
        $o[0],
        []
    );
},
2 => static function () {
    return \Symfony\Component\VarExporter\Internal\Hydrator::hydrate(
        $o = [
            clone (($p = &\Symfony\Component\VarExporter\Internal\Registry::$prototypes)['Symfony\\Component\\Serializer\\Mapping\\ClassMetadata'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Component\\Serializer\\Mapping\\ClassMetadata')),
            clone ($p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata')),
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
        ],
        null,
        [
            'stdClass' => [
                'name' => [
                    'App\\Entity\\Service',
                    'id',
                    'name',
                    'state',
                    'product',
                    'incidents',
                    'createdAt',
                    'updatedAt',
                ],
                'attributesMetadata' => [
                    [
                        'id' => $o[1],
                        'name' => $o[2],
                        'state' => $o[3],
                        'product' => $o[4],
                        'incidents' => $o[5],
                        'createdAt' => $o[6],
                        'updatedAt' => $o[7],
                    ],
                ],
                'groups' => [
                    1 => [
                        'service_read',
                    ],
                    [
                        'service_read',
                        'service_post',
                        'service_update',
                    ],
                    [
                        'service_read',
                    ],
                    [
                        'service_read',
                        'service_post',
                    ],
                    6 => [
                        'service_read',
                    ],
                    [
                        'service_read',
                    ],
                ],
            ],
        ],
        $o[0],
        []
    );
},
3 => static function () {
    return \Symfony\Component\VarExporter\Internal\Hydrator::hydrate(
        $o = [
            clone (($p = &\Symfony\Component\VarExporter\Internal\Registry::$prototypes)['Symfony\\Component\\Serializer\\Mapping\\ClassMetadata'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Component\\Serializer\\Mapping\\ClassMetadata')),
            clone ($p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata')),
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
            clone $p['Symfony\\Component\\Serializer\\Mapping\\AttributeMetadata'],
        ],
        null,
        [
            'stdClass' => [
                'name' => [
                    'App\\Entity\\User',
                    'id',
                    'name',
                    'password',
                    'roles',
                    'createdAt',
                    'updatedAt',
                    'salt',
                    'username',
                ],
                'attributesMetadata' => [
                    [
                        'id' => $o[1],
                        'name' => $o[2],
                        'password' => $o[3],
                        'roles' => $o[4],
                        'createdAt' => $o[5],
                        'updatedAt' => $o[6],
                        'salt' => $o[7],
                        'username' => $o[8],
                    ],
                ],
                'groups' => [
                    2 => [
                        'user_read',
                        'user_post',
                        'user_update',
                    ],
                    [
                        'user_read',
                        'user_post',
                    ],
                    [
                        'user_read',
                        'user_post',
                        'user_update',
                    ],
                    [
                        'user_read',
                    ],
                    [
                        'user_read',
                    ],
                ],
            ],
        ],
        $o[0],
        []
    );
},

]];
