    $(document).ready(function(){
              var resultado = false;
              var cont = 0;

        $(".form-wrapper .button").click(function(){

          if (cont == 0) {
            const marca = document.getElementById('marca');
            const modelo = document.getElementById('modelo');
            const color = document.getElementById('color');
            const date = document.getElementById('date');
            if (marca.value === "") {
              
              marca.focus();
              marca.style.backgroundColor = 'red';
              return false;
              
            }else{
              marca.style.backgroundColor = 'lightblue';
            }
              
            if (modelo.value === "") {
              modelo.focus();
              modelo.style.backgroundColor = 'red';
              return false;
            }else{
              modelo.style.backgroundColor = 'lightblue';
            }

            if (color.value === "") {
              color.focus();
              color.style.backgroundColor = 'red';
              return false;
            }else{
              color.style.backgroundColor = 'lightblue';
            }

            if (date.value === "") {
              date.focus();
              date.style.backgroundColor = 'red';
              return false;
            }else{
              date.style.backgroundColor = 'lightblue';
            }
            resultado = true;
          }

          if (cont == 2) {
            const precio = document.getElementById('precio');
            const potencia = document.getElementById('potencia');
            const ciudad = document.getElementById('ciudad');
            const pais = document.getElementById('pais');
            if (precio.value == "") {              
              precio.focus();
              precio.style.backgroundColor = 'red';
              return false;
              
            }else{
              precio.style.backgroundColor = 'lightblue';
            }
              
            if (potencia.value === "") {
              potencia.focus();
              potencia.style.backgroundColor = 'red';
              return false;
            }else{
              potencia.style.backgroundColor = 'lightblue';
            }

            if (ciudad.value === "") {
              ciudad.focus();
              ciudad.style.backgroundColor = 'red';
              return false;
            }else{
              ciudad.style.backgroundColor = 'lightblue';
            }

            if (pais.value === "") {
              pais.focus();
              pais.style.backgroundColor = 'red';
              return false;
            }else{
              pais.style.backgroundColor = 'lightblue';
            }
            resultado = true;
          }

          if (cont == 3) {
            const descripcion = document.getElementById('descripcion');
            const desc = document.getElementById('desc');
            const url = document.getElementById('url');

            if (descripcion.value == "") {
              descripcion.focus();
              descripcion.style.backgroundColor = 'red';
              return false;
              
            }else{
              descripcion.style.backgroundColor = 'lightblue';
            }
              
            if (desc.value === "") {
              desc.focus();
              desc.style.backgroundColor = 'red';
              return false;
            }else{
              desc.style.backgroundColor = 'lightblue';
            }

            if (url.value === "") {
              url.focus();
              url.style.backgroundColor = 'red';
              return false;
            }else{
              url.style.backgroundColor = 'lightblue';
            }
            resultado = true;
          }

          if (cont == 4) {
            const nombre = document.getElementById('nombre');
            const apellidos = document.getElementById('apellidos');
            const email = document.getElementById('email');
            const tlf = document.getElementById('tlf');
            if (nombre.value === "") {
              
              nombre.focus();
              nombre.style.backgroundColor = 'red';
              return false;
              
            }else{
              nombre.style.backgroundColor = 'lightblue';
            }
              
            if (apellidos.value === "") {
              apellidos.focus();
              apellidos.style.backgroundColor = 'red';
              return false;
            }else{
              apellidos.style.backgroundColor = 'lightblue';
            }

            if (email.value === "") {
              email.focus();
              email.style.backgroundColor = 'red';
              return false;
            }else{
              email.style.backgroundColor = 'lightblue';
            }

            if (tlf.value === "" || tlf.value.length != 9) {
              tlf.focus();
              tlf.style.backgroundColor = 'red';
              return false;
            }else{
              tlf.style.backgroundColor = 'lightblue';
            }
            resultado = true;
          }

          if (resultado) {
          var button = $(this);
          var currentSection = button.parents(".section");
          var currentSectionIndex = currentSection.index();
          var headerSection = $('.steps li').eq(currentSectionIndex);
          currentSection.removeClass("is-active").next().addClass("is-active");
          headerSection.removeClass("is-active").next().addClass("is-active");
          cont++;
          }
        });
      });