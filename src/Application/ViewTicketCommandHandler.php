<?php
declare(strict_types = 1);

namespace ITS\Application;

use ITS\Domain\Ticket;
use ITS\Domain\TicketRepository;

final class ViewTicketCommandHandler
{
    private TicketRepository $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function handle(ViewTicketCommand $viewTicketCommand): Ticket
    {
        return $this->ticketRepository->findById($viewTicketCommand->id());
    }
}
