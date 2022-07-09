const envio=document.getElementById('enviorel');
const cont=envio.textContent;
if (cont=="Aguardando Envio ao Realizador") {
    envio.style.backgroundColor='rgb(202, 165, 165)';
} else {
    envio.style.backgroundColor='rgb(167, 209, 166)'; 
}