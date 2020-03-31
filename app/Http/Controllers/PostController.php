<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use Redirect;
use Storage;
use Image;
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

        if (!empty($request->image)) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images', $filenameToStore);

            $postdata->image = $filenameToStore;
        }

        $form = [
            'title' => $request->title,
            'text' => $request->text,
            'hashtag' => $request->hashtag,
            'url' => $request->url,
            'iamge' => $postdata->image
        ];
        unset($form['_token']);

        try {

            $postdata->fill($form)->save();
        }
        catch(\Exception $e)
        {
            //登録失敗した場合、storageから画像削除
            Storage::delete('public/images/'. $filenameToStore);

            logger($e);
            return \Redirect::back();
        }

        //twitter連携　とりあえず無しで
//        $instance = resolve('twitter');
//
//        $text = $request->text;
//        $title =$request->title;
//        $hashtag = $request->hashtag;
//
//        if (!($title==null)){
//            $instance->post("statuses/update", [
//
//                "status" =>
//                    '【' . $title . '】' . PHP_EOL. $text . PHP_EOL. $hashtag
//            ]);
//        }else{
//            $instance->post("statuses/update", [
//
//                "status" =>
//                    $text. PHP_EOL. $hashtag
//            ]);
//        }
//
//        logger($title.' - '.$text);

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
        $image_path = $post->image;
        try {
            $post->delete();
            Storage::delete('public/images/'. $image_path);
        }
        catch(\Exception $e)
        {
            logger($e);
            return \Redirect::back();
        }
        return redirect(action('PostController@index'));
    }

}
