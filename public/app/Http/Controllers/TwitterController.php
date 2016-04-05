<?php

namespace App\Http\Controllers;

class TwitterController extends Controller
{
    protected $layout = 'layouts.app';

    public function index()
    {
        return view('pages.input');
    }

    public function printTweets()
    {
        return view('pages.tweets', [
            'tweet' => '11111111'/*$tweet->html*/
        ]);
    }

    public function FetchRandomTweet()
    {

    }
}
