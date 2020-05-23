<?php
declare(strict_types = 1);

namespace ITS\Application;

use ITS\Domain\TicketId;

final class ViewTicketCommand
{
    private TicketId $id;

    public function __construct(string $id)
    {
        $this->id = new TicketId($id);
    }

    public function id(): TicketId
    {
        return $this->id;
    }
}
