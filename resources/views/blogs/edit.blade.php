@extends('layouts.app')

@section('content')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ohoso0g4xr9d39j6kl3tpovlhbmkw2tij59j55wcrmdnufhc"></script>
<script>
tinymce.init({
selector: 'textarea',
height: 500,
menubar: false,
plugins: [
  'advlist autolink lists link image charmap print preview anchor textcolor',
  'searchreplace visualblocks code fullscreen',
  'insertdatetime media table contextmenu paste code help wordcount'
],
toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
content_css: [
  '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
  '//www.tinymce.com/css/codepen.min.css']
});
</script>
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
<form id="edit-blog" method="post" action="{{ action('BlogController@update', $id )}}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input name="_method" type="hidden" value="PATCH">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <h3>Title</h3>
          <input type="string" name="title" placeholder="Subject" class="form-control" value="{{$blog->title}}">
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Description</strong>
          <textarea rows="10" cols="10" name="description" placeholder="Description" class="form-control">{{$blog->description}}</textarea>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>ImageUpload:</strong>
              <input type="file" name="images[]" multiple>
          </div>
      </div>

      <div class="col-lg-3 text-center">
      <?php
        $decodedarr = json_decode( $blog['images'] , true);
        $image = $decodedarr[0];
      ?>
      <img class="img-rounded" style="height: 230px; width: 100%" src="{{ asset('/../images/') }}/{{$image}}"/>
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
