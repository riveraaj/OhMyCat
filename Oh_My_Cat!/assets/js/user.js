window.addEventListener('load', ()=>{
  'use strict';

  //Variables
  const form = document.querySelector('#form-info');
  const name = document.querySelector('#name');
  const apellido = document.querySelector('#apellidos');
  const email = document.querySelector('#email');
  const oldPass = document.querySelector('#oldPass');
  const newPass = document.querySelector('#newPass');
  const newPassConfirm = document.querySelector('#newPassConfirm');
  const formContainer = form.parentElement;
  const fr = new FileReader();
  const fileField = document.querySelector('.js__profile-upload-btn');
  const profileImage = document.querySelector('.js__profile-image');

  const validarCampos = ()=>{
    //Variables con sus valores
    const nameValue = name.value.trim();
    const apellidoValue = apellido.value.trim();
    const emailValue = email.value.trim();
    const oldPassValue = oldPass.value.trim();
    const newPassValue = newPass.value.trim();
    const newPassConfirmValue = newPassConfirm.value.trim();

    //Variables expresiones regulares
    const expPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,18}$/;

    //Validar el nombre
    (!nameValue) ? validarError(name, 'Campo vacío') : quitarError(name);

    //Validar el apellido
    (!apellidoValue) ? validarError(apellido, 'Campo vacío') : quitarError(apellido);

    //Validar el email
    (!emailValue) ? validarError(email, 'Campo vacío') : (!validarEmail(emailValue)) ? validarError(email, 'El e-mail no es válido') : quitarError(email);

    // //Validar el apellido
    // (!dateValue) ? validarError(date, 'Campo vacío') : quitarError(date);

    //Validar viejo password
    (!oldPassValue) ? validarError(oldPass, 'Campo vacío') : quitarError(oldPass);

    //Validar el password
    (!newPassValue) ? validarError(newPass, 'Campo vacío') : (newPassValue.length < 8) ? validarError(newPass, 'Debe tener 8 caracteres cómo mínimo.') : (!newPassValue.match(expPass)) ? validarError(newPass, 'Debe tener al menos una may., una min. y un núm.') : quitarError(newPass);

    //Validar la confirmacion del password
    (!newPassConfirmValue) ? validarError(newPassConfirm, 'Confirme su password') : (newPassValue !== newPassConfirmValue) ? validarError(newPassConfirm, 'La password no coincide') : quitarError(newPassConfirm);
  }

  const validarError = (input, msje) => {
      const formItem = input.parentElement;
      const aviso = formItem.querySelector('p');
      aviso.innerText = msje;
      formItem.className = 'form-items falla';
      formContainer.className = 'container-main in';
  }

  const quitarError = (input) => {
      const formControl = input.parentElement;
      formControl.className = 'form-items';
      formContainer.className = 'container-main out';
  }

  const validarEmail = (email) => {
      return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);        
  }

  //Obteniendo imagen del input
  function getImage(){
    const myFile = fileField.files[0];
    fr.addEventListener('load', writeImage);
    fr.readAsDataURL(myFile);
  }
  
  //Mostrando imagen del input
  function writeImage() {
    profileImage.style.backgroundImage = `url(${fr.result})`;
  }

  //Verificar que si sea una imagen con peso adecuado
  fileField.addEventListener('change',()=>{
    const img = fileField.files[0];
    var sizeMB = parseInt(img.size / 1048576);
    if(img.type.match(/image.*/)){
      if(sizeMB < 16){
        document.querySelector("#photo").style.display = "none";
        getImage();
        quitarError(fileField);
      }else {
        validarError(fileField, 'Archivo demasiado grande, máximo 16 MB');
        fileField.value = "";
      }
    }else {
      validarError(fileField, 'No corresponde a una imagen');
      fileField.value = "";
    }
  });
  
  //Enviar datos si todo esta validado
  form.addEventListener('submit', (e)=>{
    e.preventDefault();
    validarCampos();
    if(formContainer.className.includes('out')){
      var datos = new FormData($("#form-info")[0]);
      if(fileField.value){
        datos.append(fileField.files[0], fileField.files[0].name);
      }
      //Enviando datos
      $.ajax({
        type: "POST",
        url: 'assets/php/infoUsuarioPublico.php',
        data: datos,
        contentType: false,
        processData: false,
        success: function (datos) {
          const response = $.parseJSON(datos);
          if(response.password){
            if(response.guardado){
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Información guardada',
                showConfirmButton: false,
                timer: 3000
              });
            } else{
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Algo salio mal!',
                showConfirmButton: false,
                timer: 3000
              });
            }
          }else {
            validarError(oldPass, 'Contraseña incorrecta');
          }
        },
        error: function (error){
          console.log(error);
        }
      });
    }
  });
});