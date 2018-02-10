<div class="container reviewform">
  <form method="post" action="{{url('post-form')}}" enctype="multipart/form-data">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ csrf_field() }}
      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <h3>Service Form</h3>
          <strong>Name</strong>
          <input name="name" class="form-control"></input>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <strong>Email</strong>
          <input name="email" class="form-control"></input>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="col-xs-4 col-sm-12 col-md-6">
        <div id="checkboxform" class="checkbox">
          <label><input type="checkbox" name="provider[]" value="photography">Real Estate Photographers</label>
          <label><input type="checkbox" name="provider[]" value="broker">Morgage Brokers</label>
          <label><input type="checkbox" name="provider[]" value="lawyer">Real Estate Lawyers and Notaries</label>
        </div>
      </div>

    <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: right">
      <input type="submit" name="submit" class="btn btn-primary"></input>
    </div>
  </form>
</div>
