<?php
namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class MoviePostController extends Controller
{
    public $successStatus = 200;

    public function getAllPosts(Request $request) {
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null){
            $movies = Movie::all();

            return response()->json($movies, $this->successStatus);
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }
        
    }
    public function getPost(Request $request){
            $id = $request['pid']; // pid = post id 
            $token = $request['t']; // t = token
            $userid = $request['u']; // u = userid
    
            $user = User::where('id', $userid)->where('remember_token', $token)->first();
    
            if ($user != null){
                $movies = Movie::where('id', $id)->first();
    
                if ($movies != null){
                    return response()->json($movies, $this->successStatus);
                } else {
                    return response()->json(['response' => 'Post not found'], 404);
                }
            } else {
                return response()->json(['response' => 'Bad Call'], 501);
            }
    }
    public function searchPost(Request $request){
        $params = $request['p']; // p = params
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null){
            $movies = Movie::where('title', 'LIKE', '%' . $params . '%')
            ->orWhere('description', 'LIKE', '%' . $params . '%')
            ->get();
// SELECT * FROM posts WHERE song_title LIKE '%params%' OR genre LIKE '%params%' 
            if ($movies != null){
                return response()->json($movies, $this->successStatus);
            } else {
                return response()->json(['response' => 'Post not found'], 404);
            }
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }
} 
}