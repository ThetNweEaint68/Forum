<div class="panel panel-default">
    <div class="panel-heading">
        <div class="level">
            @if ($thread->creator->avatar_path)
                <img src="{{ $thread->creator->avatar_path }}"
                     alt="{{ $thread->creator->name }}"
                     width="25"
                     height="25"
                     class="mr-1">
            @endif
                <span class="flex">
                    <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted:
                            {{ $thread->title }}
                </span>

            @can ('update', $thread)
                <form action="{{ $thread->path() }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-link">Delete Thread</button>
                </form>
            @endcan
        </div>
    </div>
    <div class="panel-body">
        {{ $thread->body }}
    </div>

    <div class="panel-footer">
        <button class="btn btn-xs btn-success">Edit</button>
    </div>
</div>