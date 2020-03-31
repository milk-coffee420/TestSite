<?php

namespace App\Http\Controllers;

use App\Http\Requests\DateTimeRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{

    protected $news;

    public function __construct(News $news)
    {
        $this->news = $news;
//        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $items = News::all();
        $items = News::orderBy('publish_at', 'desc')->get();

        return view('admin.news.index',['items' => $items]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DateTimeRequest $request)
    {
        $newsdata = new News;

        $today = Carbon::now()->format('Y-m-d');
        $dt = new Carbon();
        $now = $dt->hour . ':' . $dt->minute;

        if ($request->publish_date == $request->finished_date){
            $request->validate([
                'finished_time' => 'required|after:publish_time|after:' . $now,
            ]);
        }elseif ($request->finished_date == $today) {
            $request->validate([
                'finished_time' => 'required|after:' . $now,
            ]);
        }else{
            $request->validate([
                'finished_date' => 'required|after_or_equal:publish_date|after_or_equal:' . $today,
                'finished_time' => 'required',
            ]);
        }

        $publish_at = $request->publish_date . ' ' . $request->publish_time;
        $finished_at = $request->finished_date . ' ' . $request->finished_time;

            $form = [
            'text' => $request->text,
            'publish_at' => $publish_at,
            'finished_at' => $finished_at,
        ];
        unset($form['_token']);


        $newsdata->fill($form)->save();
        return redirect('/admin/news');
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
        $item = News::find($id);
//        return $item->toArray();
        return redirect(action('NewsController@index'));
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
        $item = News::find($id);

//        return view('admin.news.edit', ['message' => '編集フォーム', $item]);
        return view('admin.news.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DateTimeRequest $request, $id)
    {
        $news = News::findOrFail($id);

        $today = Carbon::now()->format('Y-m-d');
        $dt = new Carbon();
        $now = $dt->hour . ':' . $dt->minute;

        if ($request->publish_date == $request->finished_date){
            $request->validate([
                'finished_time' => 'required|after:publish_time|after:' . $now,
            ]);
        }elseif ($request->publish_date == $today) {
            $request->validate([
                'finished_time' => 'required|after:publish_time|after:' . $now,
            ]);
        }else{
            $request->validate([
                'finished_date' => 'required|after_or_equal:publish_date|after_or_equal:' . $today,
                'finished_time' => 'required',
            ]);
        }


        $publish_at = $request->publish_date . ' ' . $request->publish_time;
        $finished_at = $request->finished_date . ' ' . $request->finished_time;
        $news->publish_at = $publish_at;
        $news->finished_at = $finished_at;
        $news->text = $request->input('text');
        $news->save();
        return redirect(action('NewsController@index'));

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
        $news = News::findOrFail($id);
        $news->delete();
        return redirect(action('NewsController@index'));
    }

    public function getTrashed(){
        $items = News::onlyTrashed()->whereNotNull('id')->orderBy('publish_at', 'desc')->get();

        return view('admin.news.trashed',['items' => $items]);
    }

    public function forceDelete($id){

        $news = News::onlyTrashed()->where('id',$id)->first();
        $news->forceDelete();

        return redirect(action('NewsController@getTrashed'));
    }

    public function restore($id){
        $news = News::onlyTrashed()->where('id',$id)->first();
        $news->restore();

        return redirect(action('NewsController@getTrashed'));
    }

}
