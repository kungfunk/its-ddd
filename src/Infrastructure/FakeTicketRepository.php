<?php
declare(strict_types = 1);

namespace ITS\Infrastructure;

use ITS\Domain\Ticket;
use ITS\Domain\TicketId;
use ITS\Domain\TicketRepository;
use ITS\Domain\TicketNotFound;

final class FakeTicketRepository implements TicketRepository
{
    private array $tickets = [
        [
            'uuid' => '177ef0d8-6630-11ea-b69a-0242ac130003',
            'description' => 'Test ticket 1',
            'status' => 'open',
        ],
        [
            'uuid' => 'b967402c-b403-47f0-b563-10c3dfb97b8b',
            'description' => 'Test ticket 2',
            'status' => 'in-progress',
        ],
        [
            'uuid' => '2a5f4571-8a62-4df3-a035-5c284d84e915',
            'description' => 'Test Ticket 3',
            'status' => 'closed',
        ],
    ];

    public function findById(TicketId $id): Ticket
    {
        $key = array_search($id->value(), array_column($this->tickets, 'uuid'));
        if ($key === false) {
            throw new TicketNotFound;
        }
        $ticket = new Ticket(
            new TicketId($this->tickets[$key]['uuid']),
            $this->tickets[$key]['description'],
            $this->tickets[$key]['status'],
        );

        return $ticket;
    }
}
