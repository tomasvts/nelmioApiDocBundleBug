<?php

namespace App\Company\Domain;

use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;

#[Schema(properties: [
    new Property(property: 'id', type: 'string', example: '8a8f8e8e-8e8e-8e8e-8e8e-8e8e8e8e8e8e'),
    new Property(property: 'name', type: 'string', example: 'Agency Name'),
    new Property(property: 'addedAt', type: 'integer', example: 1631610000),
])]
class Company
{
    public function __construct(
        private readonly string  $id,
        private readonly ?string $name,
        private readonly int $addedAt
    )
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): ?string
    {
        return $this->name;
    }

    public function addedAt(): int
    {
        return $this->addedAt;
    }
}
