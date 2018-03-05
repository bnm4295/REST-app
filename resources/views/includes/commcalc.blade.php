<head>
  <link href="{{ asset('/../css/calculator.css') }}" rel="stylesheet">
  <script src="{{ asset('/../js/calculator.js') }}"></script>
</head>
<body>
<div id="calc-logo" style="text-align: left; margin-top: 20px; margin-bottom: 20px;">
   <img style="width:200px;height:70px;" src="{{ asset('/../images/') }}/Cropped_Comission_Calculator_Logo.png"></img>
</div>
<div id="calc-container">
  <label style="text-align: left;">Property Price:</label>
  <input id="property-price" class="form-control" name="price" placeholder="$" type="number" value="" tabindex="-1"></input>
  <label style="text-align: left;">Commission %:</label>
  <input id="comnum" class="form-control" name="commission" placeholder="%" type="number" value="3.5" tabindex="-1"></input>
  <label style="text-align: left;">Marketing Fees $:</label>
  <input id="adcost" class="form-control" name="adcost" placeholder="$" type="number" value="0" tabindex="-1"></input>

  <h2>Total Commission Saved</h2>
  <label><span style="color: #3ac2c0; font-weight: bold;">By using Suuty, you SAVE: </span></label>
  <input id="totalcost" class="form-control" readonly="readonly" value="" type="text" tabindex="-1"></input>
  <label><span style="color: #3ac2c0; font-weight: bold;">With Suuty, Seller will receive: </span></label>
  <input id="sellprice-one" class="form-control" readonly="readonly" value="" type="text" tabindex="-1"></input>
  <label><span style="color: red; font-weight: bold;">Without Suuty, Seller will receive:</span></label>
  <input id="sellprice-two" class="form-control" readonly="readonly" value="" type="text" tabindex="-1"></input>
</div>
<div style="margin-top: 20px;">
  <button id="compute-btn">COMPUTE</button>
  <button id="reset-btn">RESET</button>
</div>
</body>
