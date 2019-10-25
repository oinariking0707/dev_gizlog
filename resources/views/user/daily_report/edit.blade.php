@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
  <form　action="{{ route('dailyreport.update',$daily->id) }}" method="PUT">
      <input class="form-control" name="user_id" type="hidden" value="{{ Auth::id() }}">
      <div class="form-group form-size-small">
        <input class="form-control" name="reporting_time" type="date">
        <!-- 日付入れられない -->
      <span class="help-block"></span>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Title" name="title" type="text" value="{{ $daily->title }}">
      <span class="help-block"></span>
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="本文" name="contents" cols="50" rows="10" >{{ $daily->content }}</textarea>
      <span class="help-block"></span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
  </form>
  </div>
</div>

@endsection

