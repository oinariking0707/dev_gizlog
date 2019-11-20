@extends ('common.user')
@section ('content')

<h2 class="brand-header">投稿内容確認</h2>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
      &nbsp;{{ $category }}の質問
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text">{{ $request['title'] }}</td>
          </tr>
          <tr>
            <th class="table-column">Question</th>
            <td class='td-text'>{{ $request['comment'] }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="btn-bottom-wrapper">
  @if($request['confirm'] === 'create')
    {!! Form::open(['route'=>'question.store', 'method'=>'POST']) !!}
  @else
    {!! Form::open(['route'=>['question.update', $request['id']], 'method'=>'PUT']) !!}
  @endif
      {!! Form::hidden('user_id', '') !!}
      {!! Form::hidden('tag_category_id', $request['tag_category_id']) !!}
      {!! Form::hidden('title', $request['title']) !!}
      {!! Form::hidden('comment', $request['comment']) !!}
      <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
    {!! Form::close() !!}
  </div>
</div>

@endsection

