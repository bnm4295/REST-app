<div id="filter-panel-home" class="filter-panel">
  <div class="panel panel-default">
      <div class="panel-body">
          <form action="{{url('/properties')}}" method="GET" class="form-inline" role="form">

              <div class="form-group">
                  <label class="filter-col" style="margin-right:0;" for="numbeds"></label>
                  <select id="numbeds"class="form-control" name="number_of_beds">
                     <option value="" disabled selected>Beds</option>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                </select>
              </div>
              <div class="form-group">
                  <label class="filter-col" style="margin-right:0;" for="numbaths"></label>
                  <select id="numbaths"class="form-control" name="number_of_baths">
                      <option value="" disabled selected>Baths</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                  </select>
              </div>
              <div class="form-group">
                  <label class="filter-col" style="margin-right:0;" for="proptype"></label>
                  <select id="proptype" class="form-control" name="house_type">
                    <option value="" disabled selected>Property Type</option>
                    <option value="SingleFamilyHome">Single Family Home</option>
                    <option value="Townhouse">Townhouse</option>
                    <option value="Condo">Condo</option>
                  </select>
              </div>
              <div class="form-group">
                  <label class="filter-col" style="margin-right:0;" for="pref-search"></label>
                  <input type="text" class="form-control" id="pref-search" name="addr" placeholder="City or Address">
              </div>
              <button type="submit" class="btn btn-default filter-col">
                <i class="fa fa-search" aria-hidden="true"></i> Search
              </button>
          </form>
      </div>
  </div>
</div>
