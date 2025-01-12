<?php

require_once 'vendor/autoload.php';

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\StringType;
use GraphQL\Type\Definition\FieldDefinition;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;

// Definir el tipo Query
$queryType = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'hello' => [
            'type' => new StringType(),
            'resolve' => function() {
                return 'Hola Mundo';
            }
        ]
    ]
]);

// Crear el esquema GraphQL
$schema = new Schema([
    'query' => $queryType
]);

// Ejecutar la consulta GraphQL
$query = '{ hello }'; // Consulta simple para obtener el mensaje "Hola Mundo"
$result = GraphQL::executeQuery($schema, $query);

// Mostrar el resultado
header('Content-Type: application/json');
echo json_encode($result->toArray());
