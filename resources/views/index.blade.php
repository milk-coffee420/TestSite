@extends('layouts.app')

@section('content')

    <main id="top">
        <div class="container-fluid">
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
            @if(!(\App\Movie::getLatest()->isEmpty()))
                <div class="columns">
                    @foreach(\App\Movie::getLatest() as $item)
                        <div class="column">
                            <div class="card admin_movie_card">
                                <a href="">
                                <div class="card-image">
                                    <figure class="image is-4by3">
                                        <img src="https://img.youtube.com/vi/{{ $item->youtube_id }}/sddefault.jpg" class="img-responsive">
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
                        @if($loop->iteration % 3 == 1)
                            <div class="column"></div>
                            <div class="column"></div>
                        @elseif($loop->iteration % 3 == 2)
                            <div class="column"></div>
                        @endif
                    @endforeach
                </div>
            @endif

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