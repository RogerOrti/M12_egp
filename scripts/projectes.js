window.addEventListener("load", () => {
    fetch('./api/projectes.php')
        .then( function(resposta){
           return resposta.json()
        })
        .then((projectes) => {

            const container_projectes = document.getElementById('container_projectes');
            const row = document.createElement('div');
            row.className = 'row';

            for (const projecte of projectes) {
                const col = document.createElement('div');
                col.className = 'col-12 col-md-6 col-lg-4 mt-4';

                const card = document.createElement('div');
                card.className = 'card shadow-sm';

                const card_body = document.createElement('div');
                card_body.className = 'card-body';

                create_card_title(card_body, projecte.nom);

                create_button_access(card_body, projecte.id);

                card.append(card_body);
                col.append(card);
                row.append(col);
            }

            container_projectes.append(row);
        });

    const create_card_title = (card, nom) => {
        const card_title = document.createElement('h5');
        card_title.className = 'card-title';
        card_title.textContent = nom;
        card.append(card_title);
    };

    const create_button_access = (card, id) => {
        const boto = document.createElement('a');
        boto.className = 'btn btn-primary';
        boto.href = `projecte.php?id=${id}`;
        boto.textContent = 'Accedir projecte';
        card.append(boto);
    };
});
