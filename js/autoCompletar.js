
 function LlenarTxt(valor){
    document.querySelector('#txtnombre').value = valor;
    rdiv.innerHTML = "";
  }
  function CambiarSelector(txt){
    txt = txt.toLowerCase();
    var resultado = 0;
    rdiv.innerHTML = "";
    if(txt != "") {
       var nuevaLista = "<table cellpadding=2 cellspacing=0 style='border:1px solid #000000' bgcolor='#ffffff' width=100%>";
       for(i=0; i < inpName.length; i++) {
         var strpart = inpName.options[i].value.substr(0, txt.length);
         strpart = strpart.toLowerCase();
         if (strpart == txt){
           resultado = resultado + 1;
           var cellColor = " onmouseover=\"this.style.background='#eeeeee'\" onmouseout=\"this.style.background='#ffffff'\"";
           var cellClick = " onclick=\"LlenarTxt('" + inpName.options[i].value + "')\"";
           nuevaLista += "<tr><td" + cellColor + cellClick + " style='cursor:pointer'>" + inpName.options[i].value + "</td></tr>";
         }
       }
       nuevaLista += "</table>";
       if(resultado == 0){
         document.querySelector('#txtnombre').style.background = "#ffaaaa";
       }
       else{
         document.querySelector('#txtnombre').style.background = "#ffffff";
         rdiv.innerHTML = nuevaLista;
       }
    }
  }
  
