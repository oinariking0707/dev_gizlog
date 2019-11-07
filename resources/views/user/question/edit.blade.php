@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問編集</h1>

<div class="main-wrap">
  <div class="container">
  {!! Form::open(['route'=>['question.update', $input->id], 'method'=>'PUT']) !!}
      <div class="form-group @if(!empty($errors->first('tag_category_id'))) has-error @endif">
      {!! Form::select('tag_category_id',
         ['Select category',
         'FRONT',
         'BACK',
         'INFRA',
         'OTHERS'],
         null, ['class' => 'form-control selectpicker form-size-small']) !!}
        <!-- <select name='tag_category_id' class = "form-control selectpicker form-size-small" id ="pref_id">
          <option value=""></option>
            <option value= ""></option>
        </select> -->
        <span class="help-block">{{ $errors->first('tag_category_id') }}</span>
      </div>
      <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
        <input class="form-control" placeholder="title" name="title" type="text" value="{{ $input->title }}">
        <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group @if(!empty($errors->first('comment'))) has-error @endif">
        <textarea class="form-control" placeholder="Please write down your question here..." name="comment" cols="50" rows="10">{{ $input->comment }}</textarea>
        <span class="help-block">{{ $errors->first('comment') }}</span>
      </div>
      <input name="confirm" class="btn btn-success pull-right" type="submit" value="update">
    {!! Form::close() !!}
  </div>
</div>

@endsection

