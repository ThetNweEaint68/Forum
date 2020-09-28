<div id="reply-{{ $reply->id }}" class="panel panel-default">
    <div class="panel-heading">
        <div class="level">
            <h6 class="flex">
                <a href="{{ route('profile', $reply->owner) }}">
                    {{ $reply->owner->name }}
                </a> said {{ $reply->created_at->diffForHumans() }}...
            </h6>

            <div>
                <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-default" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                        {{ $reply->favorites_count }} Favorite
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="panel-body">
        {{ $reply->body }}
    </div>

    @can ('update', $reply)
        <div class="panel-footer">
            <form method="POST" action="/replies/{{ $reply->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger btn-xs">Delete</button><br><br>
            </form>
        </div>
    @endcan
</div>