<?php

namespace App\Controller;


use App\Entity\TicketRequest;
use App\Helper\HtmlMaker;
use App\Service\TicketService;

class TicketController
{
    private TicketRequest $ticketRequest;
    private TicketService $ticketService;

    public function __construct()
    {
        $this->ticketRequest = new TicketRequest();
        $this->ticketService = new TicketService();
    }
    public function create(array $body): void
    {
        $this->ticketRequest
            ->setTicketQuantity($body['tries'])
            ->setTicketNumberQuantity($body['numbers']);

        $tickets = $this->ticketService->generate($this->ticketRequest);

        echo HtmlMaker::generateTicketTable($tickets);
    }
}