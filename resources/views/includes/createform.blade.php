<div class="container reviewform">
  <form id="serviceform" method="post" action="{{url('post-form')}}" enctype="multipart/form-data">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ csrf_field() }}
      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <h3>Service Form</h3>
          <strong>Name</strong>
          <input name="name" class="form-control" required></input>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <strong>Email</strong>
          <input type="email" name="email" class="form-control" required></input>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div id="checkboxform" class="checkbox">
          <label><input type="checkbox" name="provider[]" value="photography">Real Estate Photographers</label>
          <label><input type="checkbox" name="provider[]" value="broker">Morgage Brokers</label>
          <label><input type="checkbox" name="provider[]" value="lawyer">Real Estate Lawyers and Notaries</label>
        </div>
      </div>

    <div class="col-xs-4 col-sm-4 col-md-4" style="text-align: left">
      <button type="submit" class="btn btn-primary form-control">Send</button>
    </div>
  </form>
</div>
