/**
 * Gestograma.es
 */
var angle = 0;
var wheelAngle = angle;
var hoyAngle;
var angleDifference;
var dragging = false;
var dragTimeout;
var wheelPosition = $("#wheel").offset();
var wheelWidth = $("#wheel").width();
var wheelHeight = wheelWidth;
var wheelCentreX = Math.round(wheelPosition.left + (wheelWidth/2));
var wheelCentreY = Math.round(wheelPosition.top + (wheelHeight/2));
var updateDataTimeout;
var FURDate;
var dueDate;

var d = new Date();
var linuxzero = new Date(d.getFullYear(), 0, 1);
var theYear = d.getFullYear();
var theMonth = d.getMonth(); // Jan 0, Feb 1, March 3 ...
var theDay = d.getDate(); // 1-31
var isLeap = new Date(theYear,1,29).getDate() == 29;
var prev_isLeap = new Date(theYear-1,1,29).getDate() == 29; 
var numberOfDays = 365;
var prev_NumberOfDays = numberOfDays;
//check if Year is Leap
if(isLeap) {
	numberOfDays = 366;
}
else if(prev_isLeap) {// if it is not, check if prev Year was Leap
	prev_NumberOfDays = 366;
}

// calculate the current_Day of the year. Ex. 10th January is day 10 of the year

var current_DayOfTheYear = Math.round(((d - linuxzero) / 1000 / 60 / 60 / 24) + .5, 0);
// calculate hoy angle
hoyAngle = 360 * (current_DayOfTheYear/numberOfDays);

// set initial hoy angle
$("#hoy-image").rotate(hoyAngle);

// set initial wheel angle
$("#wheel-image").rotate(wheelAngle);

// Listeners
$("#wheel").mousedown(function(e){
	
	dragging = true;
	
	//calculate the difference between the cursorAngle and the current wheelAngle
	angle = calculateCursorAngle(e)
	angleDifference = angle - wheelAngle;
	
	$("#wheelContainer").mousemove(function(e){
		
		//if dragging
		if (dragging) {
			//alert("aha");
			angle = calculateCursorAngle(e);
			wheelAngle = angle - angleDifference;
			
			if(wheelAngle > 360)	wheelAngle -= 360;
			else if(wheelAngle < 0) wheelAngle = 360 + wheelAngle;

			// visual feedback - rotate wheel
			$("#wheel-image").rotate(wheelAngle);
			
			// update data
			updateData(wheelAngle);
		}
		
		return false
	});
	
	$("#wheelContainer").one('mouseup', function() {
	    //alert("This will show after mousemove and mouse released.");
		dragging = false;
		$("#wheelContainer").unbind();
		return false;
		
	});
	
	// Using return false prevents browser's default,
	// often unwanted mousemove actions (drag & drop)
	return false;

	
});

$("#wheel").mouseout(function(e){
	dragging = false;
	return false;
});		


function calculateCursorAngle(e) {
	var cursorAngle;
	var pageCoords = "( " + e.pageX + ", " + e.pageY + " )";
	var clientCoords = "( " + e.clientX + ", " + e.clientY + " )";
	
	var mouseX = e.pageX;
	var mouseY = e.pageY;
	
	//$("span:first").text("( e.pageX, e.pageY ) - " + pageCoords);
	//$("span:last").text("( e.clientX, e.clientY ) - " + clientCoords);
	
	// calculate the angle
	
	// 1. find info about the right triangle : wheelCentre, cursor, intersection of the deltaX and deltaY
	var deltaX = wheelCentreX - mouseX;
	var deltaY = wheelCentreY - mouseY;
	var hipotenusa = Math.round( Math.sqrt( (deltaX*deltaX) + (deltaY*deltaY) ) );
	// the angle value
	var radians = Math.asin(deltaX/hipotenusa);
	var angleBuffer = (radians*180)/Math.PI;
	//$("span:first").text("angle>>>:"+angleBuffer);
	
	
	if(mouseX >= wheelCentreX && mouseY < wheelCentreY){
		cursorAngle = - angleBuffer;
		//$("span:last").text("1: angle:"+angleBuffer);
	}
	else if(mouseX > wheelCentreX && mouseY >= wheelCentreY){
		cursorAngle = 180 + angleBuffer;
		//$("span:last").text("2: angle:"+angleBuffer);
	}
	else if(mouseX <= wheelCentreX && mouseY > wheelCentreY){
		cursorAngle = 180 + angleBuffer;
		//$("span:last").text("3: angle:"+angleBuffer);
	}
	else if(mouseX < wheelCentreX && mouseY <= wheelCentreY){
		cursorAngle = 360 - angleBuffer;
		//$("span:last").text("4: angle:"+angleBuffer);
	}
	//else {
	//	alert("calculateCursorAngle->Exception");
	//}
	
	// round angle value
	//cursorAngle = Math.round(cursorAngle);
	return cursorAngle;
	
}

function angleToDayOfTheYear(_angle){						
	var dayOfTheYear = Math.round( _angle/(360/numberOfDays) );
	//$("span:first").text("day:"+day+" angle: "+wheelAngle);
	return dayOfTheYear;
}

function dateFromDay(year, day){
  var date = new Date(year, 0); // initialize a date in `year-01-01`
  return new Date(date.setDate(day)); // add the number of days
}

function furToDueDate(_FURDOY) {
	var dueDay = (_FURDOY + 280) < 365? _FURDOY + 280 : _FURDOY + 280 - 365;//267
	//$("div#ad-300x250").html(_FURDOY);
	var dueDate = dateFromDay(theYear,dueDay);
	return dueDate;
}
function angleToDayOfTheYearMovil(_angle){	
	
	giro_inicial= 134.34;
	numberOfDays = 365;

	isLeap = new Date(theYear,1,29).getDate() == 29;
	if(isLeap) {
		numberOfDays = 366;
	}
	var dayOfTheYear = Math.round( (_angle)/(360/numberOfDays) );

	return dayOfTheYear;
}
function updateDataMovil(_wheelAngle) {
	var FUR_dayOfTheYear = angleToDayOfTheYearMovil(360 - _wheelAngle);
	alert(FUR_dayOfTheYear);
prev_NumberOfDays = 365;
//check if Year is Leap
isLeap = new Date(theYear,1,29).getDate() == 29;
if(isLeap) {
	prev_NumberOfDays = 366;
}
	d = new Date();
	linuxzero = new Date(d.getFullYear(), 0, 1);
	current_DayOfTheYear = Math.round(((d - linuxzero) / 1000 / 60 / 60 / 24) + .5, 0);

	var dayOfPregnancy = (current_DayOfTheYear > FUR_dayOfTheYear)? current_DayOfTheYear-FUR_dayOfTheYear : current_DayOfTheYear + (prev_NumberOfDays - FUR_dayOfTheYear);
	//alert(dayOfPregnancy);
	
	var weekOfPregnancy = Math.ceil(dayOfPregnancy/7);
	theYear = d.getFullYear();
	FURDate = dateFromDay(theYear,FUR_dayOfTheYear);
	dueDate = furToDueDate(FUR_dayOfTheYear);
	//$("span:first").text("dayOfPregnancy:"+dayOfPregnancy+" weekOfPregnancy: "+weekOfPregnancy);
	//var week = 
	//alert(weekOfPregnancy);
	
	// Visual Feedback: update data : F.U.R.(last menstrual date) , Fecha de parto(Due Date)
	alert(weekOfPregnancy);
	
	// visual feedback - Wheel Center
	//$("div#center-lastMenstrual").html(spanishDate(FURDate));//spanishDate(dueDate)
	//$("div#center-dueDate").html(spanishDate(dueDate));//spanishDate(dueDate)
	
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
		    //document.getElementById("result-fecha-actual").innerHTML=xmlhttp.responseText;
			eval(xmlhttp.responseText);
			d = new Date();
			$("#result-fecha-actual").html(spanishDate(d));
			$("#result-fur").html(spanishDate(d));
			$("#result-parto").html(spanishDate(dueDate));
			$("#result-fur").html(spanishDate(FURDate));
			$("#result-dbp").text(result_dbp);
			$("#result-longitud").text(result_longitud);
			$("#result-peso").text(result_peso);
			$("#result-talla").text(result_talla);
			//$("#").text();
			/*if(_week > 0 && _week <43){
				$("#result-semana").html("<a href='http://www.gestograma.es/semana-" + _week + "-de-embarazo.php'>semana " + _week + " de embarazo</a>");
			}else{
				$("#result-semana").html("En este momento no est&aacute;s embarazada");
				$("#result-semanas").html("<a href='http://www.gestograma.es/semanas-de-embarazo.php'>semanas de embarazo</a>");
			}	*/
	    }
	  }
	xmlhttp.open("GET","semanas_gestograma?semana="+weekOfPregnancy,true);
	xmlhttp.send();
	
}			
function updateData(_wheelAngle) {
	var FUR_dayOfTheYear = angleToDayOfTheYear(_wheelAngle);
	
	var dayOfPregnancy = (current_DayOfTheYear > FUR_dayOfTheYear)? current_DayOfTheYear-FUR_dayOfTheYear : current_DayOfTheYear + (prev_NumberOfDays - FUR_dayOfTheYear);

	
	var weekOfPregnancy = Math.ceil(dayOfPregnancy/7);
	
	FURDate = dateFromDay(theYear,FUR_dayOfTheYear);
	dueDate = furToDueDate(FUR_dayOfTheYear);
	//$("span:first").text("dayOfPregnancy:"+dayOfPregnancy+" weekOfPregnancy: "+weekOfPregnancy);
	//var week = 
	//alert(weekOfPregnancy);
	
	// Visual Feedback: update data : F.U.R.(last menstrual date) , Fecha de parto(Due Date)
	
	
	// visual feedback - Wheel Center
	//$("div#center-lastMenstrual").html(spanishDate(FURDate));//spanishDate(dueDate)
	//$("div#center-dueDate").html(spanishDate(dueDate));//spanishDate(dueDate)
	
	
	// get data from server
	//clearTimeout(updateDataTimeout);
	//updateDataTimeout = setTimeout("fetchDataMovil("+weekOfPregnancy+")",20);
	// get data from server
	clearTimeout(updateDataTimeout);
	updateDataTimeout = setTimeout("fetchData("+weekOfPregnancy+")",20);
}

function selectFUR(inicial){
	var inicial= inicial || 0;
	meses= ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
	giro_inicial= 134.34;
	if (inicial != 0){
		var hoy= new Date();
	  var dia= parseInt($('#dateday').val());
	  var val_tmp= $('#datemonth').val();
	  var mes= meses.indexOf(val_tmp) + 0;
	  //dia = dia + 1;
	  var numdias0= Array(0,31,59,90,120,151,181,212,243,273,304,334,365);
	  var bisiesto = new Date(hoy.getFullYear(),1,29).getDate() == 29;
	  var dia_extra= (bisiesto && (mes > 1))? 1 : 0;
	 // alert(dia_extra);
	  var num_dias= numdias0[mes] + dia_extra + dia;

	  var angulo= (bisiesto)? ((num_dias * 360)/366) : ((num_dias * 360)/365);
	  //var tiempo= parseInt(((Math.max(angulo,wheelAngle) - Math.min(angulo,wheelAngle))/30) * 400);
	  //$("#go_meses img").rotate({angle:wheelAngle,animateTo:angulo,duration:tiempo});

		
	  updateDataMovil(angulo);
	} else {
		setTimeout('selectFUR(1)',2500);
	}
	
	
}

function fetchData(_week) {
//alert(_week);
	//use AJAX to fetch next pictures
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
		    //document.getElementById("result-fecha-actual").innerHTML=xmlhttp.responseText;
			eval(xmlhttp.responseText);
			$("#result-fecha-actual").html(spanishDate(d));
			$("#result-fur").html(spanishDate(d));
			$("#result-parto").html(spanishDate(dueDate));
			$("#result-fur").html(spanishDate(FURDate));
			$("#result-dbp").text(result_dbp);
			$("#result-longitud").text(result_longitud);
			$("#result-peso").text(result_peso);
			$("#result-talla").text(result_talla);
			//$("#").text();
			/*if(_week > 0 && _week <43){
				$("#result-semana").html("<a href='http://www.gestograma.es/semana-" + _week + "-de-embarazo.php'>semana " + _week + " de embarazo</a>");
			}else{
				$("#result-semana").html("En este momento no est&aacute;s embarazada");
				$("#result-semanas").html("<a href='http://www.gestograma.es/semanas-de-embarazo.php'>semanas de embarazo</a>");
			}	*/
	    }
	  }
	xmlhttp.open("GET","semanas_gestograma?semana="+_week,true);
	xmlhttp.send();
}	


function spanishDate(date){
	var weekday=["Domingo ","Lunes ","Martes ","Miercoles ","Jueves ","Viernes ","Sabado "];
	var monthname=["Enero ","Febrero ","Marzo ","Abril ","Mayo ","Junio ","Julio ","Agosto ","Septiembre ","Octubre ","Noviembre ","Diciembre "];
	return '<span class="date-es-weekday">'+weekday[date.getDay()]+' </span><span class="date-es-day">'+date.getDate()+' </span><span class="date-es-of">de </span><span class="date-es-month">'+monthname[date.getMonth()]+' </span>';
}