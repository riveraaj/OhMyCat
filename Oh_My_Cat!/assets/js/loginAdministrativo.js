window.addEventListener('load', ()=> {

    //Varibles
    const form = document.querySelector('#loginForm');
    const email = document.getElementById('email');
    const pass = document.getElementById('pass');
    const formContainer = form.parentElement;

    form.addEventListener('submit', (e) => {
        e.preventDefault()
        validarCampos();
        if(formContainer.className.includes('out')){
            e.currentTarget.submit();
        }
    })

    const validarCampos = ()=>{
        //Variables con sus valores
        const emailValor = email.value.trim();
        const passValor = pass.value.trim();

        //Validar el email
        (!emailValor) ? validarError(email, 'Campo vacío') : quitarError(email);

        //Validar el password
        (!passValor) ? validarError(pass, 'Campo vacío') : quitarError(pass);       
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
});

