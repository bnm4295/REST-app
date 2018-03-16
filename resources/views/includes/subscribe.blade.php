<div class="container">
  <form id="contact-form" method="post" action="{{url('post-form')}}" enctype="multipart/form-data">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ csrf_field() }}
      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <h3 style="text-align:center">CONTACT FORM</h3>
          <hr style="border-color: black; width: 100px;">
          <p>
            <input name="name" class="form-control" placeholder="Name" required></input>
          </p>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <p>
            <input type="email" name="email" class="form-control" placeholder="Email" required></input>
          </p>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <p>
              <textarea rows="5" cols="5" name="description" placeholder="Description" class="form-control" required></textarea>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-2" style="text-align: left">
        <button type="submit" class="btn btn-primary form-control">Send</button>
      </div>
  </form>
</div>
