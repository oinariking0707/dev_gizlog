@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問詳細</h1>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
      <img src="" class="avatar-img">
      <p>&nbsp;{{ Auth::user()->name }}&nbsp;さんの質問&nbsp;&nbsp;(&nbsp;{{ $question->tagCategory->name }}&nbsp;)</p>
      <p class="question-date"></p>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text">{{ $question->title }}</td>
          </tr>
          <tr>
            <th class="table-column">Question</th>
            <td class='td-text'>{{ $question->comment }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="comment-list">
    <div class="comment-wrap">
      @foreach($question->comments as $commentQ)
        <div class="comment-title">
          <img src="{{ $commentQ->user->avatar }}" class="avatar-img">
          <p></p>
          <p class="comment-date">{{ $commentQ->created_at->format('Y-m-d') }}</p>
        </div>
        <div class="comment-body">{{ $commentQ->comment }}</div>
      @endforeach
    </div>
  </div>
  <div class="comment-box">
    {!! Form::open(['route'=>['question.storeComment', $question->id]]) !!}
      {!! Form::hidden('user_id', '') !!}
      {!! Form::hidden('question_id', $question->id) !!}
      <div class="comment-title">
        <img src="{{ Auth::user()->avatar }}" class="avatar-img"><p>コメントを投稿する</p>
      </div>
      <div class="comment-body @if(!empty($errors->first('comment'))) has-error @endif">
        {!! Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Add your comment...']) !!}
        <span class="help-block">{{ $errors->first('comment') }}</span>
      </div>
      <div class="comment-bottom">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
      </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection