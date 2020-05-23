<?php
declare(strict_types = 1);

namespace ITS\Domain;

use ITS\Domain\Ticket;
use ITS\Domain\TicketId;

interface TicketRepository
{
    public function findById(TicketId $id): Ticket;
}
