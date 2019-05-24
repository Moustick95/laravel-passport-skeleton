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
        $now = now();
        $datas = [];

        foreach($values as $key => $value)
            $datas[$key] = $value;
        $datas['created_at'] = $now;
        $datas['updated_at'] = $now;

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
     * Modify comment
     */
    public function updateComment(Request $request){
        $parameters = $request -> route() -> parameters();
        $body = $request -> all();
        $resp = [];

        $comment = (array)(DB::table('comments')
                -> select()
                -> where($parameters)
                -> get()
                -> toArray())[0];

        foreach($body as $key => $value)
            $comment[$key] = $value;
        $comment['updated_at'] = now();

        $result = DB::table('comments')
                -> where($parameters)
                -> update($comment);

        if($result)
            $resp = [
                "code" => 204,
                "response" => ""
            ];
        else
            $resp = [
                "code" => 404,
                "response" => "Cannot find comment with id " . $parameters["id"]
            ];
            
        return response($resp, $resp["code"]);
    }

    /**
     * Delete comment
     */
    public function deleteComment(Request $request) {
        $parameters = $request -> route() -> parameters();
        $queries = $request -> query();
        $resp = [];

        if (array_key_exists("destroy", $queries))
            $result = DB::table('comments')
                -> where($parameters)
                -> delete();
        else
            $result = DB::table('comments')
                -> where($parameters)
                -> update(["deleted_at" => now()]);

        if($result)
            $resp = [
                "code" => 204,
                "response" => ""
            ];
        else
            $resp = [
                "code" => 404,
                "response" => "Cannot find comment with id " . $parameters["id"]
            ];

        return response($resp, $resp["code"]);
    }

}
