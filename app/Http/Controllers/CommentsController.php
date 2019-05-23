<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;

class CommentsController extends Controller
{
    /**
     * Create comment
     * @param addComment $request
     */
    public function addComent(Request $request)
    {
        $bodyContent = $request->getContent();
        $bodyContent->validate([
            'owner' => 'required',
            'comment' => 'required'
        ]);
        return response($bodyContent, 200);
    }

    /**
     * Get comment
     */
    public function getCommentsByParams(Request $request) { 
        $bodyContent = $request->getContent();
        return response($bodyContent, 200);
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
