<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use Redirect;
use Abraham\TwitterOAuth\TwitterOAuth;

class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Post::orderBy('created_at', 'desc')->get();

        return view('admin.post.index',['items' => $items]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $postdata = new Post;

        $form = [
            'title' => $request->title,
            'text' => $request->text,
            'hashtag' => $request->hashtag,
        ];
        unset($form['_token']);

        try {
            $postdata->fill($form)->save();


            $instance = resolve('twitter');

            $text = $request->text;
            $title =$request->title;
            $hashtag = $request->hashtag;

            if (!($title==null)){
                $instance->post("statuses/update", [

                    "status" =>
                        '【' . $title . '】' . PHP_EOL. $text . PHP_EOL. $hashtag
                ]);
            }else{
                $instance->post("statuses/update", [

                    "status" =>
                        $text. PHP_EOL. $hashtag
                ]);
            }

            logger($title.' - '.$text);

        }
        catch(\Exception $e)
        {
logger($e);
            return \Redirect::back();
        }
        return redirect('/admin/post');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $post = Post::findOrFail($request->id);
        $post->delete();
        return redirect(action('PostController@index'));
    }

}
