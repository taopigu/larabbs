<ul class="list-unstyled">
 @foreach ($replies as $index => $reply)
 <li class=" media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
 <div class="media-left">
 <a href="{{ route('users.show', [$reply->user_id]) }}">
 <img style="width:50px" class="media-object img-thumbnail mr-3" alt="{{ $reply->user->name }}" src="{{ $reply->user->avatar}}" >
 </a>
 </div>
 <div class="media-body">
 <div class="media-heading mt-0 mb-1 text-secondary">
 <a href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name }}">
 {{ $reply->user->name }}
 </a>
 <span class="text-secondary"> • </span>
 <span class="meta text-secondary" title="{{ $reply->created_at }}">{{ $reply->created_at }}
 {{-- 回复删除按钮 --}}
 <span class="meta float-right ">
 <a title="删除回复">
 <i class="far fa-trash-alt"></i>
 </a>
 </span>
 </div>
 <div class="reply-content text-secondary">
 {!! $reply->body !!}
 </div>
 </div>
 </li>
 @if ( ! $loop->last)
 <hr>
 @endif
 @endforeach
</ul>