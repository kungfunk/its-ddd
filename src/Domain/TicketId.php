<?php
declare(strict_types = 1);

namespace ITS\Domain;

use Ramsey\Uuid\Uuid;
use InvalidArgumentException;

final class TicketId
{
    private string $value;

    public function __construct(string $value = null)
    {
        if (!Uuid::isValid($value)) {
            throw new InvalidArgumentException($value . ' is not a valid TicketIds parameter');
        }

        $this->value = $value;
    }

    public static function generate(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
