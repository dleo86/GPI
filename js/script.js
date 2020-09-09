


function Nav() {   
   
  if ( document.querySelector("#colapsado").style.width !== "300px"){  
        document.querySelector("#colapsado").style.width = "300px";
        document.querySelector("#main1").style.marginLeft = "0px";
        document.querySelector("#tabla").style.width = "1000px";
        document.querySelector("#tabla").style.marginLeft = "322px";

    }else{
        document.querySelector("#colapsado").style.width = "0px";
        document.querySelector("#main1").style.marginLeft = "0px";
        document.querySelector("#tabla").style.width = "1320px";
        document.querySelector("#tabla").style.marginLeft = "15px";
        document.querySelector("#tabla").style.transition = "0.5s";

    }
   
}
