@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報一覧</h2>
<div class="main-wrap">
  <div class="btn-wrapper daily-report">
    {!! Form::open(['route'=>'dailyreport.index','method'=>'GET']) !!}
      {!! Form::input('month','search-month',empty($month['search-month']) ? null : $month['search-month'],['class'=>'form-control']) !!}
      {!! Form::button('<i class="fa fa-search"></i>', ['type' => 'submit','class' => 'btn btn-icon']) !!}
    {!! Form::close() !!}
    {!! Form::open(['route'=>'dailyreport.create','method'=>'GET']) !!}
    {!! Form::button('<i class="fa fa-plus"></i>', ['type' => 'submit','class' => 'btn btn-icon']) !!}
    {!! Form::close() !!}
    <!-- <a class="btn btn-icon" href="{{ route('dailyreport.create') }}"><i class="fa fa-plus"></i></a> -->
  </div>
  <div class="content-wrapper table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="row">
          <th class="col-xs-2">Date</th>
          <th class="col-xs-3">Title</th>
          <th class="col-xs-5">Content</th>
          <th class="col-xs-2"></th>
        </tr>
      </thead>
      <tbody>
      @foreach($reports as $report)
        <tr class="row">
          <td class="col-xs-2">{{ ($report->reporting_time->format('m/d (D)')) }}</td>
          <td class="col-xs-3">{{ ($report->title) }}</td>
          <td class="col-xs-5">{{ ($report->content) }}</td>
          <td class="col-xs-2">
          {!! Form::open(['route'=>['dailyreport.show',$report->id],'method'=>'GET']) !!}
          {!! Form::button('<i class="fa fa-book"></i>', ['type' => 'submit','class' => 'btn']) !!}
          {!! Form::close() !!}
          <!-- <a class="btn" href="{{ route('dailyreport.show',$report->id) }}"><i class="fa fa-book"></i></a></td> -->
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection

