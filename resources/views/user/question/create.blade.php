@extends ('common.user')
@section ('content')

<h2 class="brand-header">質問投稿</h2>
<div class="main-wrap">
  <div class="container">
  {!! Form::open(['route'=>'question.confirm','method'=>'GET']) !!}
      <div class="form-group @if(!empty($errors->first('tag_category_id'))) has-error @endif">
      {!! Form::select('tag_category_id',
         ['Select category',
         'FRONT',
         'BACK',
         'INFRA',
         'OTHERS'],
         null, ['class' => 'form-control selectpicker form-size-small']) !!}
        <!-- <select name='tag_category_id' class = "form-control selectpicker form-size-small" id="pref_id">
          <option value="0">Select category</option>
            <option value= "1">FRONT</option>
            <option value= "2">BACK</option>
            <option value= "3">INFRA</option>
            <option value= "4">OTHERS</option>
        </select> -->
        <span class="help-block">{{ $errors->first('tag_category_id') }}</span>
      </div>
      <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
      {!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
        <!-- <input class="form-control" placeholder="title" name="title" type="text"> -->
        <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group @if(!empty($errors->first('comment'))) has-error @endif">
      {!! Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Please write down your question here...']) !!}
        <!-- <textarea class="form-control" placeholder="Please write down your question here..." name="content" cols="50" rows="10"></textarea> -->
        <span class="help-block">{{ $errors->first('comment') }}</span>
      </div>
      <input name="confirm" class="btn btn-success pull-right" type="submit" value="create">
      {!! Form::close() !!}
  </div>
</div>

@endsection

