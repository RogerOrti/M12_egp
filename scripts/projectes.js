window.addEventListener("load", () =>{
    fetch('api/projectes.php')
    .then(function(resposta){
        return resposta.json();
    })
    .then(function (projectes){
        

    })

});