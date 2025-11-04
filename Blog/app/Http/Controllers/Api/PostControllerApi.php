<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostControllerApi extends Controller
{
    // GET /api/posts
    public function index()
    {
        $posts = DB::table('posts')->get();
        return response()->json($posts);
    }

    // GET /api/posts/{id}
    public function show($id)
    {
        $post = DB::table('posts')->find($id);
        if (!$post) {
            return response()->json(['error' => 'Not found'], 404);
        }
        return response()->json($post);
    }

    // POST /api/posts
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);
        $data['created_at'] = now();
        $data['updated_at'] = now();

        $id = DB::table('posts')->insertGetId($data);
        return response()->json(['id' => $id], 201);
    }

    // PUT /api/posts/{id}
    public function update(Request $request, $id)
    {
        $post = DB::table('posts')->find($id);
        if (!$post) {
            return response()->json(['error' => 'Not found'], 404);
        }

        $data = $request->validate([
            'title' => 'string|max:255',
            'body'  => 'string',
        ]);
        $data['updated_at'] = now();

        DB::table('posts')->where('id', $id)->update($data);
        return response()->json(['message' => 'Updated']);
    }

    // DELETE /api/posts/{id}
    public function destroy($id)
    {
        $deleted = DB::table('posts')->where('id', $id)->delete();
        if (!$deleted) {
            return response()->json(['error' => 'Not found'], 404);
        }
        return response()->json(['message' => 'Deleted']);
    }
}
