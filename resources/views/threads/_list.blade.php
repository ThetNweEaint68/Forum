@forelse ($threads as $thread)
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="level">
                <div class="flex">
                    <h4>
                        <a href="{{ $thread->path() }}">
                            {{ $thread->title }}
                        </a>
                    </h4>

                    <h5>
                        Posted By: <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a>
                    </h5>
                </div>

                    <a href="{{ $thread->path() }}">
                        {{ $thread->replies_count }} reply
                    </a>
            </div>
        </div>

            <div class="panel-body">
                    <div class="body">{{ $thread->body }}
                    </div>
            </div>

            <div class="panel-footer">
                {{ $thread->visits }} Visits
            </div>
        </div>
@empty
    <p>There are no relevant results at this time.</p>
@endforelse