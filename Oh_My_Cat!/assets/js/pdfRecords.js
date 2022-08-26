const btnDescargar = document.getElementById('descargarExpediente');

btnDescargar.addEventListener('click', function(){
    window.open('assets/php/pdfRecords.php');
});