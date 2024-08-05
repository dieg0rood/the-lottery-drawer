<?php

namespace App\Entity;

use Exception;

class TicketRequest
{
    private int $ticketNumberQuantity;
    private int $ticketQuantity;

    public function getTicketNumberQuantity(): int
    {
        return $this->ticketNumberQuantity;
    }

    public function setTicketNumberQuantity($ticketNumberQuantity): TicketRequest
    {
        if (!is_int($ticketNumberQuantity) || $ticketNumberQuantity < 6 || $ticketNumberQuantity > 10) {
            throw new Exception('Invalid ticket quantity of numbers');
        }
        $this->ticketNumberQuantity = $ticketNumberQuantity;
        return $this;
    }

    public function getTicketQuantity(): int
    {
        return $this->ticketQuantity;
    }

    public function setTicketQuantity($ticketQuantity): TicketRequest
    {
        if (!is_int($ticketQuantity) || $ticketQuantity < 1 || $ticketQuantity > 50) {
            throw new Exception('Invalid ticket quantity');
        }
        $this->ticketQuantity = $ticketQuantity;
        return $this;
    }

}