<?php
namespace App\Http\Controllers;

use App\Post;


class DownloadController extends Controller
{

    public function index($url)
    {
        $post =Post::findByUrl($url);
        $path = $post->getPath();
        $download_name = $post->title ?? pathinfo($path, PATHINFO_BASENAME);
        return response()->download($path, $download_name);
    }
}
