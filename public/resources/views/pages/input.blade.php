@extends('pages.main')
@section('input')
    <div class="panel panel-default">
        <div class="panel-body">
            <form method="POST" id="tw-search" class="form-horizontal">
                <div class="form-group">
                    <div class="title">Tweets</div>
                    <div id="content">
                        <input type="text" placeholder="Username" name="screen_name" id="screen_name"
                               class="form-control">
                        <div><label class="error"></label></div>
                    </div>
                </div>

                <div class="form-group located-bottom">
                    <hr class="separator">
                    <button type="submit" id="more-btn" class="btn btn-default btn-tweets"> Get Timeline!</button>
                    <div id="loading"></div>
                </div>
                <input type="hidden" name="twName" id="twName" value="">
                <input type="hidden" name="twMax" id="twMax" value="">
            </form>
        </div>
    </div>
@stop
