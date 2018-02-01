<form method="post" action="{{ action('ProfileController@update', Auth::id() )}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
      <div class="form-group">
          <h2>Update Your Profile</h2>
          <strong>Name:</strong>
          <input type="string" name="name" placeholder="Name" class="form-control input-lg" value="{{Auth::user()->name}}">
      </div>
    </div>
    <div class="row">
      <div class="form-group">
        <strong>About Me</strong>
        <textarea rows="5" cols="5" name="aboutme" placeholder="Description" class="form-control" value="{{Auth::user()->aboutme}}">{{Auth::user()->aboutme}}</textarea>
      </div>
    </div>

    <div class="row">
        <div class="form-group">
            <strong>Profile Picture</strong>
            <input type="file" name="profileimg">
        </div>
    </div>

    <div class="row">
      <div class="col-md-12 text-center" style="margin-bottom: 10px">
        <button id="profile-save" class="btn btn-primary btn-lg" type="submit">Save</button>
      </div>
    </div>
</form>
