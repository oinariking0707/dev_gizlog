@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問編集</h1>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route'=>'question.confirm', 'method'=>'POST']) !!}
      <div class="form-group @if(!empty($errors->first('tag_category_id'))) has-error @endif">
        {!! Form::select('tag_category_id'
        , array_pluck($categories, 'name', 'id')
        , $questionInput->tag_category_id
        , ['class' => 'form-control selectpicker form-size-small'
        , 'id' => 'pref_id'
        , 'placeholder' => 'SelectCategory']) !!}
        <span class="help-block">{{ $errors->first('tag_category_id') }}</span>
      </div>
      <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
      {!! Form::text('title', $questionInput['title'], ['class' => 'form-control', 'placeholder' => 'title']) !!}
        <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group @if(!empty($errors->first('comment'))) has-error @endif">
      {!! Form::textarea('comment', $questionInput['comment'], ['class' => 'form-control', 'placeholder' => 'Please write down your question here...']) !!}
        <span class="help-block">{{ $errors->first('comment') }}</span>
      </div>
      {!! Form::input('submit', 'confirm', 'update', ['class' => 'btn btn-success pull-right']) !!}
      {!! Form::hidden('id', $questionInput['id']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection

