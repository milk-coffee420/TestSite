@extends('layouts.app')

@section('content')

    <main id="top">
        <div class="container-fluid">
            <div id="sec1"></div>
            @if(!(\App\News::getLatest()->isEmpty()))
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            News
                        </p>
                        <a href="#" class="card-header-icon" aria-label="more options">
                        <span class="icon">
                            <i class="fas fa-info-circle" aria-hidden="true"></i>
                        </span>
                        </a>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <table class="news">
                                @foreach(\App\News::getLatest() as $item)
                                    <tr class="news_data">
                                        <td class="news_date"><time datetime="">{{ date('Y.m.d', strtotime($item->publish_at)) }}</time></td>
                                        <td class="news_text"><div class="news_text_wrapper">{{ $item->text }}</div></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <footer class="card-footer">

                    </footer>
                </div>
            @endif
            <div id="sec2"></div>
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Movie
                    </p>
                </header>
                <div class="card-content">
                    @if(!(\App\Movie::getLatest()->isEmpty()))
                        <div class="columns">
                            @foreach(\App\Movie::getLatest() as $item)
                                <div class="column" style="display: flex;">
                                    <div class="card admin_movie_card" style="margin: 0">
                                        <a href="">
                                            <div class="card-image">
                                                <figure class="image">
                                                    <img src="https://img.youtube.com/vi/{{ $item->youtube_id }}/sddefault.jpg" class="img-responsive">
                                                    {{--<iframe src="https://www.youtube.com/embed/{{ $item->youtube_id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                                                </figure>
                                            </div>
                                            <div class="card-content">
                                                <div class="content">
                                                    {{ $item->summary }}<br>
                                                    <br>
                                                    <time datetime="{{ date('Y-m-d', strtotime($item->published_at)) }}">{{ date('Y-m-d H:i', strtotime($item->published_at)) }}</time>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @if(($loop->count % 3 == 1) && ($loop->last))
                                    <div class="column"></div>
                                    <div class="column"></div>
                                @elseif(($loop->count % 3 == 2) && ($loop->last))
                                    <div class="column"></div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
                <footer class="card-footer">

                </footer>
            </div>

            <div id="sec3"></div>
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Post
                    </p>
                </header>
                <div class="card-content">
                    @if(!(\App\Post::getLatest()->isEmpty()))
                        <div class="columns">
                            @foreach(\App\Post::getLatest() as $item)
                                <div class="column" style="display: flex;">
                                    <div class="card" style="margin: 0">
                                        <div class="card-image">
                                            <figure class="image">
                                                <img src="/storage/images/{{$item->image}}" alt="Placeholder image">
                                            </figure>
                                        </div>
                                        <div class="card-content">
                                            <div class="media">
                                                <div class="media-left">
                                                    <figure class="image is-48x48">
                                                        <img src="{{asset('/images/rabbit_demo.png')}}" alt="demo image">
                                                    </figure>
                                                </div>
                                                <div class="media-content">
                                                    <p class="title is-4">{{$item->title}}</p>
                                                    <p class="subtitle is-6">@milk-coffee420</p>
                                                </div>
                                            </div>

                                            <div class="content">
                                                {{ $item->text }}<br>
                                                <a href="#">#{{$item->hashtag}}</a><br>
                                                <a href="{{url('download/'.$item->url)}}"><i class="fas fa-file-download"></i>&nbsp;Image Download</a><br>
                                                <time datetime="{{ date('Y-m-d', strtotime($item->created_at)) }}">{{ date('Y-m-d H:i', strtotime($item->created_at)) }}</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(($loop->count % 3 == 1) && ($loop->last))
                                    <div class="column"></div>
                                    <div class="column"></div>
                                @elseif(($loop->count % 3 == 2) && ($loop->last))
                                    <div class="column"></div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
                <footer class="card-footer">

                </footer>
            </div>

        </div>

    </main>
    <style>
        .card{
            margin: 1rem;
        }
        .news_date{
            /*padding-right: 1rem;*/
            width: 120px;
            border-style: none!important;
        }
        .news_text{
            border-style: none !important;
            word-break: break-all;
        }
        .news_text_wrapper{
            white-space: pre-wrap;
        }
    </style>

@endsection