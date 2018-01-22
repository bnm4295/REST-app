<div id="filter-panel" class="filter-panel">
  <div class="panel panel-default">
      <div class="panel-body">
        <!-- {{url('properties')}} -->
          <form action="{{url('/properties')}}" method="GET" class="form-inline" role="form">

              <div class="form-group">
                  <label class="filter-col" style="margin-right:0;" for="numbeds">Beds:</label>
                  <select id="numbeds"class="form-control" name="number_of_beds">
                     <option value=""></option>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                </select>
              </div> <!-- form group [rows] -->
              <div class="form-group">
                  <label class="filter-col" style="margin-right:0;" for="numbaths">Baths:</label>
                  <select id="numbaths"class="form-control" name="number_of_baths">
                      <option value=""></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                  </select>
              </div> <!-- form group [rows] -->
              <div class="form-group">
                  <label class="filter-col" style="margin-right:0;" for="proptype">Property Type:</label>
                  <select id="proptype" class="form-control" name="house_type">
                    <option value="Single Family Home">Single Family Home</option>
                    <option value="Apartment">Apartment</option>
                    <option value="Condo">Condo</option>
                  </select>
              </div> <!-- form group [rows] -->
              <div class="form-group">
                  <label class="filter-col" style="margin-right:0;" for="pref-search">City:</label>
                  <input type="text" class="form-control input-sm" id="pref-search" name="addr">
              </div>
              <!-- form group [search] -->
              <!--div class="form-group">
                  <label class="filter-col" style="margin-right:0;" for="pref-orderby">Order by:</label>
                  <select id="pref-orderby" class="form-control">
                      <option>Descendent</option>
                  </select>
              </div>  form group [order by] -->
              <h2>Price Range</h2>
              <div class="col-sm-6">
                  <div class="range-slider">
                    <input class="range-slider__range" type="range" value="0" min="0" max="5000000" name="price_left">
                    <span class="range-slider__value">0</span>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="range-slider">
                    <input class="range-slider__range" type="range" value="2500000" min="2500000" max="5000000" name="price_right">
                    <span class="range-slider__value">0</span>
                  </div>
              </div>
              <h2>Area Range</h2>
              <div class="col-sm-6">
                  <div class="range-slider">
                    <input class="range-slider__range" type="range" value="0" min="0" max="50000" name="area_left">
                    <span class="range-slider__value">0</span>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="range-slider">
                    <input class="range-slider__range" type="range" value="25000" min="25000" max="50000" name="area_right">
                    <span class="range-slider__value">0</span>
                  </div>
              </div>
              <div class="form-group">
                <div class="checkbox" style="margin-left:10px; margin-right:10px;">
                  <label><input type="checkbox" name="mempar">Save Search</label>
                </div>
              </div>
              <button type="submit" class="btn btn-default filter-col">
                <i class="fa fa-search" aria-hidden="true"></i> Search
              </button>
          </form>
      </div>
  </div>
</div>

    <!--button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#filter-panel">
        <span class="glyphicon glyphicon-cog"></span> Advanced Search
    </button>-->
