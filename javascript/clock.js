function time() {
  var now = new Date();
  var d = now.getDate()
  d = d+1;
  if (d == 1 || d == 21 || d == 31){
    day = d+"<sup>st</sup>";
  }else if (d==2 || d == 22) {
    day = d+"<sup>nd</sup>";
  }else if (d==3 || d == 23) {
    day = d+"<sup>rd</sup>";
  } else {
    day = d+"<sup>th</sup>";
  }
  var y = now.getFullYear()
  var m = now.getMonth()
  switch (m) {
    case 0:
      month = "january";
      break;
    case 1:
      month = "february";
      break;
    case 2:
      month = "march";
      break;
    case 3:
      month = "april";
      break;
    case 4:
      month = "may";
      break;
    case 5:
      month = "june";
      break;
    case 6:
      month = "july";
      break;
    case 7:
      month = "august";
      break;
    case 8:
      month = "september";
      break;
    case 9:
      month = "october";
      break;
    case 10:
      month = "november";
      break;
    case 11:
      month = "december";
      break;

  }
  var d = now.getDay()
  switch(d){
    case 0:
        day = "sunday" + day + " of";
        break;
    case 1:
        day = "monday"  + day + " of";
        break;
    case 2:
        day = "tuesday"  + day + " of";
        break;
    case 3:
        day = "wednesday"  + day + " of";
        break;
    case 4:
        day = "thursday"  + day + " of";
        break;
    case 5:
        day = "friday"  + day + " of";
        break;
    case 6:
        day = "saturday"  + day + " of";
  }
  var h = now.getHours();
  var mi = now.getMinutes()
  if (mi < 10){mi = "0"+mi};

  document.getElementById("datetime").innerHTML = "<p><span id=date>"+day + " "+month+" "+ y+"</span> <br><span id='time'>"+ h+":"+mi+"</span></p>";
  setTimeout(time, 5000);   // one update of #datetime per 5 sec
}
