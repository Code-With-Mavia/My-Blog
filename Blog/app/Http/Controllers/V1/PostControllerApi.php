<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\V1\Models\Post;
use App\Http\Controllers\V1\Models\User;
use App\Http\Controllers\v1\Models\Category;
use Car;
use Exception;

use function Pest\Laravel\json;

class PostControllerApi extends Controller
{
    public function test()
    {
        return response()->json(['ok']);
    }
    //          POSTS METHODS           //
    // GET /api/posts
    public function index()
    {
        try 
        {
            $posts = Post::select('id', 'user_id','category_id', 'title','body', 'comments', 'created_at','updated_at')->latest()->paginate(15);
            if ($posts->isEmpty())
            {
                throw new Exception('Failed to fetch posts. Please try again later');
            }
            return response()->json($posts);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()],404);   
        }
    }

    // GET /api/posts/{id}
    public function show($id)
    {
        try 
        {
            $post = Post::find($id);
            if(!$post)
            {
                throw new Exception('Post not found. Please try again later');
            }
            return response()->json($post);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    // POST /api/posts
    public function store(Request $request)
    {
        try 
        {
            $data = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'title' => 'required|string|max:255',
                'body'  => 'required|string',
                'comments' => 'required|string',
            ]);
            $post = Post::create($data);
            return response()->json($post, 201);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => 'Failed to create post. Please try again later'], 400);
        }
    }

    // PUT /api/posts/{id}
    public function update(Request $request, $id)
    {
        try 
        {
            $post = Post::find($id);
            if(! $post)
            {
                throw new Exception('Failed to update post. Please try again later');
            }
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'body'  => 'required|string',
                'comments' => 'required|string',
            ]);
            $post->update($data);
            return response()->json($post, 200);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // POST /api/comments/{id}
    public function postComments(Request $request, $id)
    {
        try 
        {
            $post = Post::find($id);
            if (!$post) {
                throw new Exception('Failed to update comments. Please try again later');
            }
            $data = $request->validate([
                'comments' => 'required|string',
            ]);
            $post->comments = $data['comments'];
            $post->save();
            return response()->json($post, 200);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // GET /api/posts/comments
    public function listComments()
    {
        try 
        {
            $posts = Post::select(['id','user_id','title','body','comments','created_at','updated_at'])->latest()->paginate(10);
            if ($posts->isEmpty()) 
            {
                throw new Exception('Failed to fetch comments. Please try again later');
            }

            return response()->json($posts);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    // DELETE /api/posts/{id}
    public function destroy($id)
    {
        try {
            $post = Post::find($id);
            if (!$post) 
            {
                throw new Exception('Failed to delete post. Please try again later');
            }
            $post->delete();
            return response()->json(['message' => 'Deleted']);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 404);

        }
    }

    // GET /api/posts/{id}/author
    public function postAuthor($id)
    {
        try 
        {
            $post = Post::find($id);
            if (!$post) 
            {
                throw new Exception('Failed to fetch posts. Please try again later');
            }
            $user = $post->user;
            return response()->json($user);
        } 
        catch(Exception $e) 
        {
            // Responsibility: Unexpected error handling
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    
    // GET /api/posts/find?query=keyword
    public function findPosts(Request $request)
    {
        try 
        {
            $query = $request->query('query');
            if (empty($query)) 
            {
                throw new Exception('Failed to search posts. Please try again later');
            }
            $posts = Post::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($query) . '%'])->get();
            return response()->json($posts);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error'=> $e->getMessage()], 404);
        }
    }

    //          USERS METHODS           //
    // GET /api/users/{id}/posts
    public function userPosts($id)
    {
        try 
        {
            $user = User::find($id);
            if (!$user) 
            {
               throw new Exception('Failed to fetch user posts. Please try again later');
            }
            return response()->json($user->posts);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    // GET /api/users/recent
    public function recentUsers()
    {
        try 
        {
            $users = User::latest()->limit(30)->get();
            if(count($users) == 0)
            {
                throw new Exception('Failed to fetch recent users. Please try again later');
            }
            $userSummaries = $users->map(function ($user) { 
                return [
                'id'=> $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'posts_count' => $user->posts()->count(),
                'registered_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];
            });
            return response()->json($userSummaries, 200);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    // GET /api/users/{id}/stats
    public function userStats($id)
    {
        try 
        {
            $user = User::find($id);
            if (!$user) 
            {
                throw new Exception('Failed to fetch user stats. Please try again later');
            }
            return response()->json([
                'name' => $user->name,
                'email' => $user->email,
                'posts_count' => $user->posts()->count(),
                'registered_at' => $user->created_at,
                'updated_at'=> $user->updated_at,
            ]);
        } 
        catch (Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    // Categories Methods
    // GET api/categories
    public function categories()
    {
        try 
        {
            $categories = Category::select('id','name', 'slug', 'created_at', 'updated_at')->paginate(10)->get();
            if (!$categories)
            {
                throw new Exception('Categoires not found',402);
            }
            return response()->json($categories,200);
        }
        catch (Exception $e)
        {
            return response()->json(['error'=> $e->getMessage()], 404);
        }
    }
}
?>