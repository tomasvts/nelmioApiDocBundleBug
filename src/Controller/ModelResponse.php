<?php

namespace App\Controller;

use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes\Attachable;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\MediaType;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\XmlContent;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class ModelResponse extends Response
{
    public function __construct(
        string $model,
        object|string|null $ref = null,
        int|string $response = 200,
        ?string $description = 'Successful response',
        ?array $headers = null,
        MediaType|JsonContent|array|Attachable|XmlContent|null $content = null,
        ?array $links = null,
        ?array $x = null,
        ?array $attachables = null
    )
    {
        $content = is_null($content) ? new JsonContent(properties: [
            new Property(property: 'data', ref: new Model(type: $model)),
            new Property(property: 'meta', type: 'object')
        ]) : $content;

        parent::__construct(
            $ref,
            $response,
            $description,
            $headers,
            $content,
            $links,
            $x,
            $attachables
        );
    }
}
