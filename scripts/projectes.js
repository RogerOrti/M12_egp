window.addEventListener("load", () =>{
    fetch()
    .then(function(resposta){
        return resposta.json();
    })
    .then(function (projectes){
        const card = document.getElementById();


        for (const projecte of projectes) {
            

        }
    })



    createTd = (tr, text) => {
        const td = document.createElement('td');
        td.textContent = text;
        tr.append(td);
    }

    createButtonAccedir = (td, projecte) => {
        const form = document.createElement('form');

        td.appendChild(form);

        const button = document.createElement('button   ');
    }    



});