<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    protected $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Movie::orderBy('published_at', 'desc')->get();

        return view('admin.movie.index',['items' => $items]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        $moviedata = new Movie;

        $today = Carbon::now()->format('Y-m-d');
        $dt = new Carbon();
        $now = $dt->hour . ':' . $dt->minute;

        if ($request->published_date == $request->finished_date){
            $request->validate([
                'finished_time' => 'required|after:published_time|after:' . $now,
            ]);
        }elseif ($request->finished_date == $today) {
            $request->validate([
                'finished_time' => 'required|after:' . $now,
            ]);
        }else{
            $request->validate([
                'finished_date' => 'required|after_or_equal:published_date|after_or_equal:' . $today,
                'finished_time' => 'required',
            ]);
        }

        $published_at = $request->published_date . ' ' . $request->published_time. ':00';
        $finished_at = $request->finished_date . ' ' . $request->finished_time. ':00';
        logger($published_at);
        logger($finished_at);
        $form = [
            'youtube_id' => $request->youtube_id,
            'title' => $request->title,
            'summary' => $request->summary,
            'text' => $request->text,
            'published_at' => $published_at,
            'finished_at' => $finished_at,
        ];
        unset($form['_token']);


        $moviedata->fill($form)->save();
        return redirect('/admin/movie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $item = Movie::find($id);
//        return $item->toArray();
        return redirect(action('MovieController@index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = Movie::find($id);

        return view('admin.movie.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $today = Carbon::now()->format('Y-m-d');
        $dt = new Carbon();
        $now = $dt->hour . ':' . $dt->minute;

        if ($request->published_date == $request->finished_date){
            $request->validate([
                'finished_time' => 'required|after:published_time|after:' . $now,
            ]);
        }elseif ($request->published_date == $today) {
            $request->validate([
                'finished_time' => 'required|after:published_time|after:' . $now,
            ]);
        }else{
            $request->validate([
                'finished_date' => 'required|after_or_equal:published_date|after_or_equal:' . $today,
                'finished_time' => 'required',
            ]);
        }

        $published_at = $request->published_date . ' ' . $request->published_time. ':00';
        $finished_at = $request->finished_date . ' ' . $request->finished_time. ':00';
        $movie->published_at = $published_at;
        $movie->finished_at = $finished_at;
        $movie->youtube_id = $request->input('youtube_id');
        $movie->title = $request->input('title');
        $movie->summary = $request->input('summary');
        $movie->text = $request->input('text');
        $movie->save();
        return redirect(action('MovieController@index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect(action('MovieController@index'));
    }

    public function getTrashed(){
        $items = Movie::onlyTrashed()->whereNotNull('id')->orderBy('published_at', 'desc')->get();

        return view('admin.movie.trashed',['items' => $items]);
    }

    public function forceDelete($id){

        $movie = Movie::onlyTrashed()->where('id',$id)->first();
        $movie->forceDelete();

        return redirect(action('MovieController@getTrashed'));
    }

    public function restore($id){
        $movie = Movie::onlyTrashed()->where('id',$id)->first();
        $movie->restore();

        return redirect(action('MovieController@getTrashed'));
    }
}
