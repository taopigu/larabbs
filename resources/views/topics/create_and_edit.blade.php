@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
            <i class="far fa-edit"></i>
          @if($topic->id)
            编辑话题
          @else
            新建话题
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($topic->id)
          <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                	<input class="form-control" type="text" name="title" id="title-field" placeholder="请填输入文章标题" value="{{ old('title', $topic->title ) }}" />
                </div>
                <div class="form-group">
                     <select class="form-control" name="category_id" required>
                         <option value="" hidden disabled selected>请选择分类</option>
                         @foreach ($categories as $value)
                         <option value="{{ $value->id }}">{{ $value->name }}</option>
                         @endforeach
                     </select>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="6" type="text" name="body" id="body-field" value="{{ old('body', $topic->body ) }}" placeholder="请填入至少三个字符的内容" ></textarea>
                </div>
          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
