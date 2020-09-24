@if(count($answers) > 0)

    <ul class="list-unstyled">
        @foreach ($answers as $answer)
            <li class="media mb-3">
                <div class="media-body border-top">
                    @if(Auth::id() == $answer->user_id)
                        <div>質問者</div>
                    @endif
                    <div>
                        <small class="" style=color:gray;>answered at：{{ $answer->created_at->format('Y/m/d') }}</small>
                    </div>
                    <div>
                        <p class="mb-0 col-12">{!! nl2br(e($answer->answer)) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

@endif