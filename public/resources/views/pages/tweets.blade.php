@extends('pages.main')
@section('tweet')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="tweet-embed">
                        {!!  $tweet !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
