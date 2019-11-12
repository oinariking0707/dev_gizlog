@extends ('common.user')
@section ('content')

<h2 class="brand-header">質問投稿</h2>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route'=>'question.confirm', 'method'=>'POST']) !!}
      <div class="form-group @if(!empty($errors->first('tag_category_id'))) has-error @endif">
      {!! Form::select('tag_category_id'
    , array_pluck($categories, 'name', 'id')
    , ''
    , ['class' => 'form-control selectpicker form-size-small'
    , 'id' => 'pref_id'
    , 'placeholder' => 'SelectCategory']) !!}
    <span class="help-block">{{ $errors->first('tag_category_id') }}</span>
      </div>
      <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
        {!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
        <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group @if(!empty($errors->first('comment'))) has-error @endif">
        {!! Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Please write down your question here...']) !!}
        <span class="help-block">{{ $errors->first('comment') }}</span>
      </div>
      <input name="confirm" class="btn btn-success pull-right" type="submit" value="create">
    {!! Form::close() !!}
  </div>
</div>

@endsection


