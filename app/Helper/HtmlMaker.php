<?php

namespace App\Helper;

class HtmlMaker
{
    public static function generateTicketTable($data) {
        if (!isset($data['tickets']) || !is_array($data['tickets'])) {
            throw new \Exception('Invalid data format');
        }

        $html = '<table border="1" cellspacing="0" cellpadding="5">';
        $html .= '<tr><th>Ticket #</th>';

        $numDezenas = isset($data['tickets'][0]) ? count($data['tickets'][0]) : 0;
        for ($i = 1; $i <= $numDezenas; $i++) {
            $html .= '<th>Dezena ' . $i . '</th>';
        }
        $html .= '</tr>';

        foreach ($data['tickets'] as $index => $ticket) {
            $html .= '<tr>';
            $html .= '<td>' . ($index + 1) . '</td>';
            foreach ($ticket as $number) {
                $html .= '<td>' . $number . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</table>';
        return $html;
    }
}