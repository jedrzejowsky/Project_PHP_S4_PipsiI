@if($post->comments->count() > 0)
    <p class="h2 fw-bold mt-5 mb-3">{{ $post->comments->count() }} {{ $post->comments->count() > 1 ? 'Comments' : 'Comment'}}</p>
@foreach($post->comments as $comment)
    <div class="flex-grow-1 flex-shrink-1 comment mb-3 p-2">
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-1">
                    <img class="img-avatar" src="https://i.pravatar.cc/150?u={{ $comment->user_id }}"/>
                    {{ $comment->author->name }} <span class="small">- {{ date('d.m.Y', strtotime($comment->date)) }}</span>
                </p>
                @can('edit-comment', $comment)

                    <div class="d-flex justify-content-center ms-auto">
                        <a href=" {{route('comment.edit', $comment->id) }}" class="btn btn-primary btn-block ms-auto btn-sm me-2" role="button">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('comment.delete', $comment->id) }}">
                            @csrf
                            {{ method_field('DELETE') }}
                        <button class="button btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                        </form>
                    </div>

                @endcan
            </div>
            <p class="mb-1">
                {{ $comment->content }}
            </p>
        </div>
    </div>
@endforeach
@endif
