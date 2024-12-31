window.addEventListener("load", () =>{
    fetch()
    .then(function(resposta){
        return resposta.json();
    })


});