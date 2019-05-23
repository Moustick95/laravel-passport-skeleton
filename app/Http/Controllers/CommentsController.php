<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Enumerators\ComparatorEnum;

class CommentsController extends Controller
{
    /**
     * Create comment
     * @param Request $request
     */
    public function createComment(Request $request) {
        $body = $request -> all();
        $parameters = $request -> route() -> parameters();
        $values = array_merge($body, $parameters);
        $datas = [];

        foreach($values as $key => $value)
            $datas[$key] = $value;

        $id = DB::table('comments')
                -> insertGetId($datas);

        $resp = DB::table('comments')
                -> select()
                -> where("id", "=", $id)
                -> get();

        return response($resp, 200);
    }

    /**
     * Get comment
     * 
     */
    public function getCommentsByParams(Request $request) { 
        $queries = $request -> all();
        $sql = DB::table('comments');
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
     * Delete comment
     */
    public function deleteComment(Request $request) {
        $parameters = $request -> route() -> parameters();
        $resp = [];

        $result = DB::table('comments')
                -> where($parameters)
                ->delete();

        if($result)
            $resp = [
                "code" => 200,
                "responce" => "Comment deleted"
            ];
        else
            $resp = [
                "code" => 400,
                "responce" => "Cannot delete comment"
            ];

        return response($resp, 200);
    }

    /**
     * Soft Delete comment
     */
    public function softDeleteComment(Request $request, $id) {   
        return response($id, 200);
    }
}
