function verify(who) {
  var pass1 = document.getElementById("pass1").value;
  var pass2 = document.getElementById("pass2").value;

  console.log(pass1.length >8 && pass2.length >8);
  console.log(pass1 !== pass2);
  console.log(pass1 !== pass2 && (pass1.length >8 && pass2.length >8))

  if(pass1 === pass2 && (pass1.length >8 && pass2.length >8)){
    document.getElementById("indicate_1").innerHTML='<i class="fas fa-check valid"></i>';
    document.getElementById("indicate_2").innerHTML='<i class="fas fa-check valid"></i>';
    $(".form-submit-button").prop("disabled", false);
  } else {
    $(".form-submit-button").prop("disabled", true);
    document.getElementById("indicate_1").innerHTML='<i class="fas fa-exclamation-circle error" title="Provided passwords don\'t match"></i>';
    document.getElementById("indicate_2").innerHTML='<i class="fas fa-exclamation-circle error" title="Provided passwords don\'t match"></i>';

  }

    console.log(pass1);
  }
