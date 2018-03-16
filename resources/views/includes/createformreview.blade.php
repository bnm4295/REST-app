<div class="container">
  <form id="addcomments" method="post" action="{{url('post-form')}}" enctype="multipart/form-data">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ csrf_field() }}
      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <h3>Add Your Comments</h3>
          <hr>
          <strong>Name</strong>
          <input name="name" class="form-control" required></input>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <strong>Email</strong>
          <input type="email" name="email" class="form-control" required></input>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Description:</strong>
            <textarea rows="5" cols="5" name="description" placeholder="Description" class="form-control" required></textarea>
          </div>
        </div>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4" style="text-align: left">
        <button type="submit" class="btn btn-primary form-control">Send</button>
      </div>
  </form>
</div>
