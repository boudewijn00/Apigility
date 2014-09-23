<?php
return array(
    'router' => array(
        'routes' => array(
            'theridiid.rest.sleep' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/sleep[/:sleep_id]',
                    'defaults' => array(
                        'controller' => 'Theridiid\\V1\\Rest\\Sleep\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'theridiid.rest.sleep',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Theridiid\\V1\\Rest\\Sleep\\SleepResource' => 'Theridiid\\V1\\Rest\\Sleep\\SleepResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'Theridiid\\V1\\Rest\\Sleep\\Controller' => array(
            'listener' => 'Theridiid\\V1\\Rest\\Sleep\\SleepResource',
            'route_name' => 'theridiid.rest.sleep',
            'route_identifier_name' => 'sleep_id',
            'collection_name' => 'sleep',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Theridiid\\V1\\Rest\\Sleep\\SleepEntity',
            'collection_class' => 'Theridiid\\V1\\Rest\\Sleep\\SleepCollection',
            'service_name' => 'Sleep',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Theridiid\\V1\\Rest\\Sleep\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Theridiid\\V1\\Rest\\Sleep\\Controller' => array(
                0 => 'application/vnd.theridiid.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Theridiid\\V1\\Rest\\Sleep\\Controller' => array(
                0 => 'application/vnd.theridiid.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Theridiid\\V1\\Rest\\Sleep\\SleepEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'theridiid.rest.sleep',
                'route_identifier_name' => 'sleep_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Theridiid\\V1\\Rest\\Sleep\\SleepCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'theridiid.rest.sleep',
                'route_identifier_name' => 'sleep_id',
                'is_collection' => true,
            ),
        ),
    ),
);
