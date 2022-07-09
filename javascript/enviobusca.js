for (var i = 0; i < tamanho; i++) {
    var envio=document.getElementById('enviorel'+i);
    var conteudoEnvio=envio.textContent;
    if (conteudoEnvio=="Aguardando Envio ao Realizador") {
        envio.style.backgroundColor='rgb(202, 165, 165)';
    } else {
        envio.style.backgroundColor='rgb(167, 209, 166)'; 
    }


}