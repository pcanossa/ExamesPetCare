for (var i = 0; i < tamanho; i++) {
    var str=document.getElementById('str'+i);
    var conteudo=str.textContent;
    if (conteudo=="Em Realização") {
        str.style.backgroundColor='rgb(202, 165, 165)';
    } else {
        str.style.backgroundColor='rgb(167, 209, 166)'; 
    }
}