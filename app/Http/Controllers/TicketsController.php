<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;


class TicketsController extends Controller
{
    /**
     * Create ticket
     * @param createTicket $request
     */
    public function createTicket(Request $request){
        $ticketEntry = new Ticket();

        $ticketEntry->title = $request->input('title');
        $ticketEntry->description = $request->input('description');
        $ticketEntry->priority = $request->input('priority');
        $ticketEntry->state = $request->input('state');
        $ticketEntry->owner = $request->input('owner');

        $ticketEntry->save();
        return response($bodyContent, 200);
        
        
    }

    /**
     * Get ticket
     */
    public function getTicketById(Request $request, $id) {   
        return response('test');
    }

     /**
     * Get ticket by params
     */
    public function getTicketsByParams(Request $request) {   
        $bodyContent -> $request -> getContent();
        return response('test');
    }

    /**
     * Update ticket by body
     */
    public function updateTicket(Request $request) {   
        return response($request, 200);
    }

    /**
     * Delete ticket
     */
    public function deleteTicket(Request $request, $id) {   
        return response($id, 200);
    }

    /**
     * Soft Delete ticket
     */
    public function softDeleteTicket(Request $request, $id) {   
        return response($id, 200);
    }
}
