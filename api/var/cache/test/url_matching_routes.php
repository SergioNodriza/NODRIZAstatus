<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/12' => [[['_route' => 'pruebas', '_controller' => 'App\\Controller\\Action\\Pruebas::tryArrayArray'], null, null, null, false, false, null]],
        '/api/incidents/create' => [[['_route' => 'api_incidents_register_collection', '_controller' => 'App\\Controller\\Action\\Incident\\CreateIncident', '_format' => null, '_api_resource_class' => 'App\\Entity\\Incident', '_api_collection_operation_name' => 'register'], null, ['POST' => 0], null, false, false, null]],
        '/api/users/create' => [[['_route' => 'api_users_register_collection', '_controller' => 'App\\Controller\\Action\\User\\CreateUser', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'register'], null, ['POST' => 0], null, false, false, null]],
        '/api/users/login' => [[['_route' => 'api_users_login_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'login'], null, ['POST' => 0], null, false, false, null]],
        '/api/products/create' => [[['_route' => 'api_products_register_collection', '_controller' => 'App\\Controller\\Action\\Product\\CreateProduct', '_format' => null, '_api_resource_class' => 'App\\Entity\\Product', '_api_collection_operation_name' => 'register'], null, ['POST' => 0], null, false, false, null]],
        '/api/products/names' => [[['_route' => 'api_products_names_collection', '_controller' => 'App\\Controller\\Action\\Product\\NameProduct', '_format' => null, '_api_resource_class' => 'App\\Entity\\Product', '_api_collection_operation_name' => 'names'], null, ['GET' => 0], null, false, false, null]],
        '/api/products/general' => [[['_route' => 'api_products_generalState_collection', '_controller' => 'App\\Controller\\Action\\Product\\GeneralState', '_format' => null, '_api_resource_class' => 'App\\Entity\\Product', '_api_collection_operation_name' => 'generalState'], null, ['GET' => 0], null, false, false, null]],
        '/api/services/create' => [[['_route' => 'api_services_register_collection', '_controller' => 'App\\Controller\\Action\\Service\\CreateService', '_format' => null, '_api_resource_class' => 'App\\Entity\\Service', '_api_collection_operation_name' => 'register'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:42)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:72)'
                        .'|contexts/(.+)(?:\\.([^/]++))?(*:107)'
                        .'|incidents(?'
                            .'|(?:\\.([^/]++))?(*:142)'
                            .'|/(?'
                                .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:182)'
                                .')'
                                .'|([^/]++)/services(?:\\.([^/]++))?(*:223)'
                            .')'
                        .')'
                        .'|users(?'
                            .'|(?:\\.([^/]++))?(*:256)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:293)'
                            .')'
                        .')'
                        .'|products(?'
                            .'|(?:\\.([^/]++))?(*:329)'
                            .'|/(?'
                                .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:369)'
                                .')'
                                .'|([^/]++)/services(?:\\.([^/]++))?(*:410)'
                            .')'
                        .')'
                        .'|services(?'
                            .'|(?:\\.([^/]++))?(*:446)'
                            .'|/(?'
                                .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:486)'
                                .')'
                                .'|([^/]++)/incidents(?:\\.([^/]++))?(*:528)'
                            .')'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        42 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        72 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        107 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        142 => [[['_route' => 'api_incidents_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Incident', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        182 => [
            [['_route' => 'api_incidents_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Incident', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_incidents_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Incident', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_incidents_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Incident', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        223 => [[['_route' => 'api_incidents_services_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Service', '_api_subresource_operation_name' => 'api_incidents_services_get_subresource', '_api_subresource_context' => ['property' => 'services', 'identifiers' => [['id', 'App\\Entity\\Incident', true]], 'collection' => true, 'operationId' => 'api_incidents_services_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        256 => [[['_route' => 'api_users_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        293 => [
            [['_route' => 'api_users_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_users_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        329 => [[['_route' => 'api_products_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Product', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        369 => [
            [['_route' => 'api_products_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Product', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_products_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Product', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        410 => [[['_route' => 'api_products_services_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Service', '_api_subresource_operation_name' => 'api_products_services_get_subresource', '_api_subresource_context' => ['property' => 'services', 'identifiers' => [['id', 'App\\Entity\\Product', true]], 'collection' => true, 'operationId' => 'api_products_services_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        446 => [[['_route' => 'api_services_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Service', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        486 => [
            [['_route' => 'api_services_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Service', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_services_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Service', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_services_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Service', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        528 => [
            [['_route' => 'api_services_incidents_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Incident', '_api_subresource_operation_name' => 'api_services_incidents_get_subresource', '_api_subresource_context' => ['property' => 'incidents', 'identifiers' => [['id', 'App\\Entity\\Service', true]], 'collection' => true, 'operationId' => 'api_services_incidents_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
