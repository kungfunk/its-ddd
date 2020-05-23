<?php
declare(strict_types = 1);

namespace ITS\Domain;

final class TicketStatus
{
    public const OPEN = 'open';
    public const IN_PROGRESS = 'in-progress';
    public const CLOSED = 'closed';
}
