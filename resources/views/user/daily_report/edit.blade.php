@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
  {!! Form::open(['route'=>['dailyreport.update',$daily->id],'method'=>'PUT']) !!}
  {!! Form::input('hidden', 'user_id', Auth::id(), ['class' => 'form-control']) !!}
      <div class="form-group form-size-small">
      {!! Form::input('date', 'reporting_time', Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
        <!-- 日付入れられない -->
      <span class="help-block"></span>
      </div>
      <div class="form-group">
      {!! Form::input('text', 'title', $daily->title, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
      <span class="help-block"></span>
      </div>
      <div class="form-group">
      {!! Form::textarea('content', $daily->content, ['class' => 'form-control', 'placeholder' => '本文']) !!}
      <span class="help-block"></span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
  {!! Form::close() !!}
  </div>
</div>

@endsection

