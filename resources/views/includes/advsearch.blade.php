<div id="filter-panel" class="filter-panel" style="text-align: initial;">
  <div id="advsearchbody" class="panel panel-default">
      <div class="alert alert-info">
        <i style="font-size: 20px;"class="fa fa-info-circle" aria-hidden="true"><strong></strong></i>
        <p>Remember to check the save search box for notifications with every new listing that matches your search!</p>
      </div>
      <div class="panel-body">
        <form action="{{url('/properties')}}" method="GET" class="form-inline" role="form">
          <div class="row row-relative">
              <div class="col-md-2 col-border">
                <div class="col-md-12">
                  <div class="col-border-padding">
                      <label class="filter-col" style="margin-right:0;" for="numbeds">Ba</label>
                      <select id="numbeds"class="form-control input-md" name="number_of_beds">
                           <option value="" disabled selected>Beds</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                      </select>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-border">
                <div class="col-md-12">
                  <div class="col-border-padding">
                        <label class="filter-col" style="margin-right:0;" for="numbaths">Be</label>
                        <select id="numbaths"class="form-control input-md" name="number_of_baths">
                          <option value="" disabled selected>Baths</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="col-md-4 col-border">
                  <div class="col-md-12">
                    <div class="col-border-padding">
                        <label class="filter-col" style="margin-right:0;" for="proptype">Property Type</label>
                        <select id="proptype" class="form-control input-md" name="house_type">
                          <option value="" disabled selected>Property Type</option>
                          <option value="SingleFamilyHome">Single Family Home</option>
                          <option value="Townhouse">Townhouse</option>
                          <option value="Condo">Condo</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="col-md-4 col-border">
                   <div class="col-lg-12">
                    <div class="col-border-padding">
                        <label class="filter-col" style="margin-right:0;" for="pref-search">City</label>
                        <input type="text" class="form-control input-md" id="pref-search" name="addr" placeholder="City">
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                  <div class="range-slider">
                    <label class="filter-col" style="margin-right:0;" for="price-left">Price MIN</label>
                    <input class="range-slider__range" type="range" value="0" min="0" max="5000000" name="price_left">
                    <span class="range-slider__value">0</span>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="range-slider">
                    <label class="filter-col" style="margin-right:0;" for="price-right">Price MAX</label>
                    <input class="range-slider__range" type="range" value="2500000" min="2500000" max="5000000" name="price_right">
                    <span class="range-slider__value">0</span>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                  <div class="range-slider">
                    <label class="filter-col" style="margin-right:0;" for="area-left">Area MIN</label>
                    <input class="range-slider__range" type="range" value="0" min="0" max="50000" name="area_left">
                    <span class="range-slider__value">0</span>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="range-slider">
                    <label class="filter-col" style="margin-right:0;" for="area-right">Area MAX</label>
                    <input class="range-slider__range" type="range" value="25000" min="25000" max="50000" name="area_right">
                    <span class="range-slider__value">0</span>
                  </div>
              </div>
            </div>
            <hr>
            <div class="row" style="text-align: center;">
              <div class="form-group">
                <div class="checkbox" style="margin-left:10px; margin-right:10px;">
                  <label><input type="checkbox" name="mempar">Save Search</label>
                </div>
              </div>
              <button type="submit" class="btn btn-default filter-col">
                <i class="fa fa-search" aria-hidden="true"></i>Update
              </button>
            </div>
          </form>
      </div>
  </div>
</div>
