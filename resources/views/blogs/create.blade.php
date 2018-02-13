@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
@if (Auth::guard('admin')->check() == true )
  <form id="create-blog" method="post" action="{{url('blogs')}}" enctype="multipart/form-data">
    <meta name="csrf-token" content="{{csrf_token()}}">
    {{ csrf_field() }}

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Text</strong>
          <input type="string" name="title" placeholder="title" class="form-control">
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Text</strong>
          <textarea rows="10" cols="10" name="description" placeholder="Description" class="form-control"></textarea>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>ImageUpload:</strong>
              <input type="file" name="images[]" multiple>
          </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <input type="submit" name="submit" class="btn btn-primary">
      </div>
    </div>

  </form>
@else
<script>
window.location.href = "/";
</script>
@endif
</div>
@endsection
