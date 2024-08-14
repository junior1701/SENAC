const salvar = document.getElementById('salvar');

async function insert() {
    const form = document.getElementById("form");
    if (!form) {
        throw new Error("Formulário não encontrado.");
    }
    const formData = new FormData(form);
    const options = {
        method: "POST",
        headers: new Headers({
            'Accept': 'application/json',
            // Adicione outros cabeçalhos necessários aqui
        }),
        body: formData
    };
    try {
        const response = await fetch(`/salvarcurso.php`, options);
        return await response.json();
    } catch (error) {
        throw new Error(error.message()); // Propaga o erro para ser tratado por quem chamou a função
    }
}

salvar.addEventListener('click', async () => {

    const response = await insert();

    console.log(response);

});