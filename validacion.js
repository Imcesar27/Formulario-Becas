function validar(){
const info = ["nombre","apellido","cedula","direccion","nacimiento","sangre","email","telefono", "celular","color","pelota","promedio"]
   
    let isReadyToSend = true;//bandera o identificador para saber si el form se puede enviar

    info.forEach(campo => { //Seleccion del HTML
        let c = document.querySelector(`[name="${campo}"]`)//Las `` te permiten tener mas comillas dentro asi como variables con el $ {variable}
        
        if (c.value.trim() == ""){ //trim borra el espacio en blanco al principio y al final
            //verificar el padre de c 
            const padre = c.parentElement
            //borrar span si existe
            let hijo = padre.querySelector("span")//hijo sera igual a un span
            if(hijo){ // si hijo es algo valido
                hijo.remove(); // lo remueve
            }
            //crear span
            const span = document.createElement("span");
            span.innerHTML = "*Campo obligatorio"
            span.classList.add("validacion")//agregando la clase ejemplo class=xxx
            //insertar
            padre.appendChild(span) //appendchild solo funciona con elementos HTML, inserta span al final de padre
            
            isReadyToSend = false;
        }
        else {//borrara el mensaje si el campo tiene valor
            
            const padre = c.parentElement
            //borrar span si existe
            let hijo = padre.querySelector("span")//hijo sera igual a un span
            if(hijo){ // si hijo es algo valido
                hijo.remove(); // lo remueve
            }

        }

    });

    if(isReadyToSend){//Si esta listo para enviar entonces postea la informacion que se encuentre en "Formbeca" que seria el formulario
        const form = document.querySelector("#formBeca");
        form.submit();
    }

}