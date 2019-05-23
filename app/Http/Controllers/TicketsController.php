<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TicketsController extends Controller
{
    /**
     * Create ticket
     * @param createTicket $request
     */
    public function createTicket(Request $request){
        $queries = $request -> all();
        $datas = [];

        foreach($queries as $key => $query)
            $datas[$key] = $query;

        $id = DB::table('tickets')->insertGetId($datas);

        $resData = DB::table('tickets')
            ->select()
            ->where('id', '=', $id)
            ->get();

        return response($resData, 200);
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
