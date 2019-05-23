<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;

class TicketsController extends Controller
{
    /**
     * Create ticket
     * @param addTicket $request
     */
    public function addTicket(Request $request)
    {
        $bodyContent = $request->getContent();
        $bodyContent->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'owner' => 'required',
            'priority' => 'required',
            'state' => 'required'
        ]);
        return response($bodyContent, 200);
    }

    /**
     * Get ticket
     */
    public function getTicketById(Request $request, $id) {   
        return response($id, 200);
    }

     /**
     * Get ticket by params
     */
    public function getTicketsByParams(Request $request) {   
        return response($request, 200);
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
