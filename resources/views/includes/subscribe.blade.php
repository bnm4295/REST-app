<form method="post" action="{{url('post-form')}}" enctype="multipart/form-data">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{ csrf_field() }}
  <div class="form-group">
    <input name="name" class="form-control" placeholder="Name"></input>
  </div>
  <div class="form-group">
    <input name="email" class="form-control" placeholder="Email"></input>
  </div>
  <input type="submit" name="submit" class="btn btn-primary form-control" value="Subscribe"></input>
</form>
