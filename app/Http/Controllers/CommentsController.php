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
     * @param $request
     */
    public function createComment(Request $request)
    {
        $bodyContent = $request -> getContent();
        // DB::table('users')->insert(
        //     ['email' => 'john@example.com', 'votes' => 0]
        // );
        return response($bodyContent, 200);
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
    public function deleteComment(Request $request, $id) {   
        return response($id, 200);
    }

    /**
     * Soft Delete comment
     */
    public function softDeleteComment(Request $request, $id) {   
        return response($id, 200);
    }
}
