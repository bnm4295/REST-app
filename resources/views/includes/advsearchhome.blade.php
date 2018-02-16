<div id="filter-panel-home" class="filter-panel"><!-- height 300px -->
  <form action="{{url('/properties')}}" method="GET" role="form">
            <!--div class="form-group">
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
            <div style="">-->
      <label class="filter-col" style="margin-right:0;" for="pref-search"></label>
      <div style="display: block; width: 800px; max-width: 100%; margin: 0 auto 11px; position: relative;">
        <input type="text" class="form-control input-lg pref-search" id="autocomplete" name="addr" placeholder="Anywhere">
        <span style="position: absolute; right: 0; top: 0; z-index: 10; padding: 0; width: 46px; font-size: 20px; height: 46px; line-height: 46px; border: 0;">
          <button style="background: none; border: 0; color: #2cace3; padding: 14px; display: table-cell; border-radius: 0">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
        </span>
      </div>
  </form>
</div>
