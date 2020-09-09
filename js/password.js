// Mostrar u ocultar password 
        function Mostrar() { 
            var temp = document.querySelector("#pass"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 