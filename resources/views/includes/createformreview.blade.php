<div class="container reviewform">
  <form method="post" action="{{url('post-form')}}" enctype="multipart/form-data">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ csrf_field() }}
      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <h3>Add Your Comments</h3>
          <strong>Name</strong>
          <input name="name" class="form-control"></input>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <strong>Email</strong>
          <input name="email" class="form-control"></input>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Description:</strong>
            <textarea rows="5" cols="5" name="description" placeholder="Description" class="form-control"></textarea>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: right">
        <input type="submit" name="submit" class="btn btn-primary"></input>
      </div>
  </form>
</div>
