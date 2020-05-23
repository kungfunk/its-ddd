<?php
declare(strict_types = 1);

namespace ITS\Domain;

final class InvalidTicketStatus extends \Exception
{
    public function __construct()
    {
        parent::__construct('Invalid ticket status');
    }
}
