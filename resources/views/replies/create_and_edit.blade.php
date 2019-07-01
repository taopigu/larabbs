@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Reply /
          @if($reply->id)
            Edit #{{ $reply->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($reply->id)
          <form action="{{ route('replies.update', $reply->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="topic_id-field">Topic_id</label>
                    <input class="form-control" type="text" name="topic_id" id="topic_id-field" value="{{ old('topic_id', $reply->topic_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $reply->user_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="is_block-field">Is_block</label>
                    <input class="form-control" type="text" name="is_block" id="is_block-field" value="{{ old('is_block', $reply->is_block ) }}" />
                </div> 
                <div class="form-group">
                    <label for="vote_count-field">Vote_count</label>
                    <input class="form-control" type="text" name="vote_count" id="vote_count-field" value="{{ old('vote_count', $reply->vote_count ) }}" />
                </div> 
                <div class="form-group">
                	<label for="body-field">Body</label>
                	<textarea name="body" id="body-field" class="form-control" rows="3">{{ old('body', $reply->body ) }}</textarea>
                </div> 
                <div class="form-group">
                	<label for="body_original-field">Body_original</label>
                	<textarea name="body_original" id="body_original-field" class="form-control" rows="3">{{ old('body_original', $reply->body_original ) }}</textarea>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('replies.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
