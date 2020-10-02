<div id="reply-{{ $reply->id }}" class="panel panel-default">
    <div class="panel-heading">
        <div class="level">
            <h6 class="flex">
                <a href="{{ route('profile', $reply->owner) }}">
                    {{ $reply->owner->name }}
                </a> said {{ $reply->created_at->diffForHumans() }}...
            </h6>

            @if (Auth::check())
                <div>
                    <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                    {{ csrf_field() }}

                        <button type="submit" class="glyphicon glyphicon-heart" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                        {{ $reply->favorites_count }} Favorite
                        </button>
                        <favorite :reply="{{ $reply }}"></favorite>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <div class="panel-body" v-html="body">
        {{ $reply->body }}
    </div><br>

    @can ('update', $reply)
        <div class="panel-footer level">
        	<button type="submit" class="btn btn-success">Edit</button>&nbsp;

            <form method="POST" action="/replies/{{ $reply->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger">Delete</button><br>
            </form>
        </div>
    @endcan
</div>