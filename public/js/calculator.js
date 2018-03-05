window.onload=function(){
	var x = document.getElementById('compute-btn');
	var y = document.getElementById('reset-btn');

	x.addEventListener("click", compute);
	y.addEventListener("click", reset);
}
function compute(){
  var getPrice = document.getElementById('property-price').value;
  var getCom = document.getElementById('comnum').value;
  var getAdcost = document.getElementById('adcost').value;
  if(getAdcost == ""){
    getAdcost = 0;
  }

  var getPercentage = getCom * 0.01;

  var result = parseInt(getPrice * getPercentage) + parseInt(getAdcost);

  var sellresult = getPrice - result;

  document.getElementById('sellprice-one').value = '$' + commafy(getPrice-990);
  document.getElementById('sellprice-two').value = '$' + commafy(sellresult);
  document.getElementById('totalcost').value = '$' + commafy(result);
  if (result == ""){
    result = 0;
  }
}

function commafy( num ) {
    var str = num.toString().split('.');
    if (str[0].length >= 5) {
        str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }
    if (str[1] && str[1].length >= 5) {
        str[1] = str[1].replace(/(\d{3})/g, '$1 ');
    }
    return str.join('.');
}

function reset(){
  document.getElementById('totalcost').value = "";
  document.getElementById('property-price').value = "";
  document.getElementById('comnum').value = "";
  document.getElementById('adcost').value = "";
  document.getElementById('sellprice').value = "";
}
