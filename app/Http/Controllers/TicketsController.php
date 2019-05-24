<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ticket;
use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\GetTicketRequest;
use App\Http\Requests\GetTicketsRequest;
use App\Http\Requests\ModifyTicketRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Enumerators\ComparatorEnum;


class TicketsController extends Controller
{
    /**
     * Create ticket
     * @param createTicket $request
     */
    public function createTicket(CreateTicketRequest $request){
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
    public function getTicketById(GetTicketRequest $request, $id) { 

        $resData = DB::table('tickets')
            ->select()
            ->where('id', '=', $id)
            ->get();

        if (sizeof($resData) === 0) {
            $json_error = array('message' => "No data available for this Id", 'status' => "404");
            $json_error = json_encode($json_error);
            return response($json_error, 404);
        }

        return response($resData, 200);
    }

     /**
     * Get ticket by params
     * @param Request $request
     */
    public function getTicketsByParams(GetTicketsRequest $request) {   
        $queries = $request -> all();
        $sql = DB::table('tickets');
        $wheres = [];

        foreach($queries as $key => $query)
            foreach($query as $where)
                array_push($wheres, [
                    $key,
                    ComparatorEnum::$operators[$where["operator"]],
                    $where["comparator"]
                ]);
        $sql -> where($wheres);
        return response($sql -> get(), 200);
    }

    /**
     * Update ticket by body
     */
    public function updateTicket(ModifyTicketRequest $request, $id) {   
        $queries = $request -> all();
        $datas = [];

        foreach($queries as $key => $query)
            $datas[$key] = $query;
        
        $sql = DB::table('tickets')->where('id', '=', $id)->update($datas);
        return response($request, 200);
    }

    /**
     * Delete ticket
     */
    public function deleteTicket(Request $request, $id) {   
        $queries = $request -> query();
        $sql = DB::table('tickets')->where('id', '=', $id)->delete();
        $resp = [];

        if (sizeof()) {
            # code...
        }

        var_dump($queries);

        if($sql)
            $resp = [
                "code" => 204,
                "response" => ""
            ];
        else
            $resp = [
                "code" => 404,
                "response" => "Cannot find ticket with id " . $id
            ];  

        return response($resp, $resp['code']);
    }
}
