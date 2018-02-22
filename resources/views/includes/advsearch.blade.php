<!--div id="filter-panel" class="filter-panel" style="text-align: initial;">
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
</div-->
<div id="advsearch" class="container-fluid">
  <form id="propsearch" action="{{url('/properties')}}" method="GET" class="form-inline" role="form">
    <div class="row">
        <select id="numbeds" class="btn form-control" name="number_of_beds" style="margin-right:5px;">
          <option value="" disabled selected>Beds</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
        <select id="numbaths" class="btn form-control" name="number_of_baths" style="margin-right: 5px;">
          <option value="" disabled selected>Baths</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
        <!--housetype-->
        <select id="proptype" class="btn form-control" name="house_type" style="margin-right: 5px;">
          <option value="" disabled selected>Property Type</option>
          <option value="SingleFamilyHome">Single Family Home</option>
          <option value="Townhouse">Townhouse</option>
          <option value="Condo">Condo</option>
        </select>
        <!-- city -->
        <input type="text" class="form-control input-md" id="autocomplete" name="addr" placeholder="City">

        <!-- prices -->
        <div class="dropdown" style="float:left; margin-left: 10px;">
          <button href="#" class="dropdown-toggle form-control input-md" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
            <b>Price Range</b><span class="caret"></span>
          </button>
          <div class="dropdown-menu" style="min-width: 350px;" role="menu">
            <div style="margin: 20px">
              <h3>Price MIN</h3>
              <input type="text" name="price_left" value="0" selectBoxOptions="200000;300000;400000;500000;600000;700000;800000;900000;1000000;2000000;3000000;4000000;5000000">
              <hr>
              <h3>Price MAX</h3>
              <input type="text" name="price_right" value="5000000" selectBoxOptions="200000;300000;400000;500000;600000;700000;800000;900000;1000000;2000000;3000000;4000000;5000000">
            </div>
          </div>
        </div>
        <div class="dropdown" style="float:left; margin-left: 10px; margin-right: 10px;">
          <button href="#" class="dropdown-toggle form-control input-md" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
            <b>Area Range</b><span class="caret"></span>
          </button>
          <div class="dropdown-menu" style="min-width: 350px;" role="menu">
            <div style="margin: 20px;">
              <h3>Area MIN</h3>
              <input type="text" name="area_left" value="0" selectBoxOptions="2000;3000;4000;5000;6000;7000;8000;9000;10000;20000;30000;40000;50000">
              <hr>
              <h3>Area MAX</h3>
              <input type="text" name="area_right" value="50000" selectBoxOptions="2000;3000;4000;5000;6000;7000;8000;9000;10000;20000;30000;40000;50000">
            </div>
          </div>
        </div>

        <!--div class="dropdown" style="float:left; margin-left: 10px; margin-right: 10px;">
          <a href="#" class="dropdown-toggle form-control input-md" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
            <b>Prices</b><span class="caret"></span>
          </a>
          <div class="dropdown-menu" style="min-width: 260px;" role="menu">
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
          </div>
        </div>
        <div class="dropdown" style="float:left; margin-right: 10px;">
          <a href="#" class="dropdown-toggle form-control input-md" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
            <b>Areas</b><span class="caret"></span>
          </a>
          <div class="dropdown-menu" style="min-width: 260px;" role="menu">
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
          </div>
        </div>-->

        <div class="dropdown" style="margin-left: 5px; margin-right: 5px; display: inline">
          <button href="#" type="button" class="dropdown-toggle form-control input-md" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
            <b>Save Search</b>
          </button>
          <div class="dropdown-menu" style="min-width: 350px;" role="menu">
            <div style="margin: 20px">
              <h3 style="text-align:center">Save Your Current Search</h3>
              @if(Auth::check())
                <button type="submit" style="width:100%" class="btn btn-primary btn-lg" name="mempar" value="1">
                  <span>Save Search</span>
                </button>
              @else
                <button type="button" style="width:100%" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mylogin">Sign In to Save Search</button>
              @endif
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-default filter-col form-control">
          <i class="fa fa-search" aria-hidden="true"></i>Update
        </button>
      </div>
  </form>
</div>
