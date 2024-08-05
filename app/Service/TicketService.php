<?php

namespace App\Service;

use App\Entity\TicketRequest;

class TicketService
{
    public function generate(TicketRequest $ticketRequest): array
    {
        $tickets = [];
        for ($i = 0; $i < $ticketRequest->getTicketQuantity(); $i++) {
            $numbers = range(1, 60);
            shuffle($numbers);
            $ticket = array_slice($numbers, 0, $ticketRequest->getTicketNumberQuantity());
            sort($ticket);

            $tickets[] = $ticket;
        }

        return ['tickets' => $tickets];
    }


}