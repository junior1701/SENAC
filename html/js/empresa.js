const Save = document.getElementById("salvar");

async function Insert() {
    try {
        const form = document.getElementById("form");
        const formData = new FormData(form);
        const options = {
            method: "POST",
            body: formData,
        };
        const response = await fetch('/empresa/insert', options);
        return await response.json();
    } catch (error) {
        throw new Error(error.message);
    }
}
async function Update() {
    try {
        const form = document.getElementById("form");
        const formData = new FormData(form);
        const options = {
            method: "POST",
            body: formData,
        };
        const response = await fetch('/empresa/update', options);
        return await response.json();
    } catch (error) {
        throw new Error(error.message);
    }
}

Save.addEventListener("click", async () => {
    const response = await Insert();

    if (response.status) {
        await ControlAlert.SetId('mensagem').Primary("Salvando os Dados...", 2000);
        await ControlAlert.SetId('mensagem').Sucess('Cadastro realizado!', 1000);
        ControlAlert.IsRedirect('/empresa/lista', 2000);
    } else {
        ControlAlert.SetId('mensagem').danger(response.msg)
    }
});
async function Deletar(id) {
    const form = document.getElementById("form");
    const formData = new FormData(form);
    const options = {
        method: 'POST',
        body: formData,
    }
    const response = await fetch('/empresa/deletar', options);
    return await response.json();
}



Save.addEventListener("click", async () => {
//está função trata dois tipos de variaveis: se o valor do campo for 'c' será realizado o Insert, caso o valor seja 'e' sera realizado o Update
    const response = (document.getElementById('acao').value === 'c') ? await Insert() : await Update();

    if (response.status) {
        await ControlAlert.SetId('mensagem').Primary("Salvando os Dados...", 2000);
        await ControlAlert.SetId('mensagem').Sucess('Cadastro realizado!', 1000);
        ControlAlert.IsRedirect('/empresa/lista', 2000);
    } else {
        ControlAlert.SetId('mensagem').danger(response.msg)
    }
});