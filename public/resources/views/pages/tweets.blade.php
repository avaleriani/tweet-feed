@foreach($tweets as $index =>$tweet)
    <div class="tweet">
        <span class="tweet-image"><img src="{!! $tweet->user->profile_image_url !!}" alt="user-image"/></span>
        <span class="tweet-text">{!! $tweet->text !!}</span>
    </div>
    @if ($index != count($tweets) -1)
        <hr class="separator">
    @endif
@endforeach
