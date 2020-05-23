<?php
declare(strict_types = 1);

namespace ITS\Domain;

use ITS\Domain\TicketId;
use ITS\Domain\TicketStatus;
use ITS\Domain\InvalidTicketStatus;

final class Ticket
{
    private TicketId $id;
    private string $description;
    private string $status;

    private array $allowedStatus = [
        TicketStatus::OPEN,
        TicketStatus::IN_PROGRESS,
        TicketStatus::CLOSED,
    ];

    public function __construct(TicketId $id, string $description, string $status = TicketStatus::OPEN)
    {
        $this->id = $id;
        $this->description = $description;
        $this->status = $status;
    }

    public function id(): TicketId
    {
        return $this->id;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function updateStatus(string $status): void
    {
        if (!in_array($status, $this->allowedStatus)) {
            throw new InvalidTicketStatus;
        }

        $this->status = $status;
    }
}
