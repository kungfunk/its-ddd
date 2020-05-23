<?php
declare(strict_types = 1);

namespace ITS\Domain;

final class TicketNotFound extends \Exception
{
    public function __construct()
    {
        parent::__construct('Ticked not found');
    }
}
