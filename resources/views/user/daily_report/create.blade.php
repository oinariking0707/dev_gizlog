@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
  {!! Form::open(['route'=>'dailyreport.store']) !!}
  {!! Form::input('hidden', 'user_id', Auth::id(), ['class' => 'form-control']) !!}
      <div class="form-group form-size-small">
      {!! Form::input('date', 'reporting_time', Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
    <span class="help-block"></span>
    </div>
    <div class="form-group">
    {!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
      <span class="help-block"></span>
    </div>
    <div class="form-group">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Content']) !!}
      <span class="help-block"></span>
    </div>
    <button type="submit" class="btn btn-success pull-right">Add</button>
    {!! Form::close() !!}
  </div>
</div>

@endsection

