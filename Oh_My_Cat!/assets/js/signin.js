window.addEventListener('load', ()=> {

    //Varibles
    const form = document.querySelector('#signinForm');
    const usuario = document.getElementById('usuario');
    const email = document.getElementById('email');
    const cedula = document.getElementById('cedula');
    const pass = document.getElementById('pass');
    const passConfirm = document.getElementById('passConfirm');
    const formContainer = form.parentElement;

    form.addEventListener('submit', (e) => {
        e.preventDefault()
        validarCampos();
        if(formContainer.className.includes('out')){
            e.currentTarget.submit();
        }
    })

    const validarCampos = ()=>{

        //Variables expresiones regulares
        const expPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,18}$/;

        //Variables con sus valores
        const cedulaValor = cedula.value.trim();
        const usuarioValor = usuario.value.trim();
        const emailValor = email.value.trim();
        const passValor = pass.value.trim();
        const passConfirmValor = passConfirm.value.trim();

        //Validar cedula
        (!cedulaValor) ? validarError(cedula, 'Campo vacío') : (cedulaValor.length != 9) ? validarError(cedula, 'Digite los 9 digitos (sin el 0 del principio)') : quitarError(cedula);

        //Validar al usuario
        (!usuarioValor) ? validarError(usuario, 'Campo vacío') : quitarError(usuario);

        //Validar el email
        (!emailValor) ? validarError(email, 'Campo vacío') : (!validarEmail(emailValor)) ? validarError(email, 'El e-mail no es válido') : quitarError(email);

        //Validar el password
        (!passValor) ? validarError(pass, 'Campo vacío') : (passValor.length < 8) ? validarError(pass, 'Debe tener 8 caracteres cómo mínimo.') : (!passValor.match(expPass)) ? validarError(pass, 'Debe tener al menos una may., una min. y un núm.') : quitarError(pass);

        //Validar la confirmacion del password
        (!passConfirmValor) ? validarError(passConfirm, 'Confirme su password') : (passValor !== passConfirmValor) ? validarError(passConfirm, 'La password no coincide') : quitarError(passConfirm);
    }

    const validarError = (input, msje) => {
        const formItem = input.parentElement;
        const aviso = formItem.querySelector('p');
        aviso.innerText = msje;
        formItem.className = 'form-items falla';
        formContainer.className = 'form-container in';
    }

    const quitarError = (input) => {
        const formControl = input.parentElement;
        formControl.className = 'form-items';
        formContainer.className = 'form-container out';
    }

    const validarEmail = (email) => {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);        
    }
});