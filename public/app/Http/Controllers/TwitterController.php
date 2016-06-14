<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twitter;

class TwitterController extends Controller
{
    protected $layout = 'layouts.app';

    /**
     * @return mixed
     */
    public function index()
    {
        return view('pages.input');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getTweets(Request $request)
    {
        $quantity = 5;
        $screenName = $request->get('username');

        if ($screenName) {
            try {
                $tweets = Twitter::getUserTimeline(["screen_name" => $screenName, "count" => $quantity]);
                if ($tweets) {
                    $view = view('pages.tweets', ['tweets' => $tweets, 'lastKey' => key(end($tweets))])->render();
                    return response()->json(array('success' => true, 'cont' => $view, 'max_id' => end($tweets)->id));
                } else {
                    return response()->json(array('success' => false, 'cont' => 'No tweets.'));
                }
            } catch (\Exception $e) {
                return response()->json(array('success' => false, 'cont' => $e->getMessage()));
            }
        }
    }

    public function getMoreTweets(Request $request)
    {
        $quantity = 6;
        $screenName = $request->get('username');
        $maxId = $request->get('max_id');

        if ($screenName) {
            try {
                $tweets = Twitter::getUserTimeline(["screen_name" => $screenName, "count" => $quantity, 'max_id' => $maxId]);
                array_shift($tweets);
                if ($tweets) {
                    $view = view('pages.tweets', ['tweets' => $tweets, 'lastKey' => key(end($tweets))])->render();
                    return response()->json(array('success' => true, 'cont' => $view, 'max_id' => end($tweets)->id));
                } else {
                    return response()->json(array('success' => false, 'cont' => 'No tweets.'));
                }
            } catch (\Exception $e) {
                return response()->json(array('success' => false, 'cont' => $e->getMessage()));
            }
        }
    }
}
