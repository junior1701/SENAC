const salvar = document.getElementById('salvar');
const Action = document.getElementById('action');

async function Insert() {
    const form = document.getElementById('dados_cliente');
    const formData = new FormData(form);
    const option = {
        method: 'POST',
        body: formData
    };
    const response = await fetch('controllercliente.php', option);
    return await response.json();
}

async function Update() {
    const form = document.getElementById('dados_cliente');
    const formData = new FormData(form);
    const option = {
        method: 'POST',
        body: formData
    };
    const response = await fetch('controllercliente.php', option);
    return await response.json();
}

salvar.addEventListener('click', async () => {
    if (Action.value === 'insert') {
        const response = await Insert();
        if (response.status) {
            alert(response.msg);
        } else {
            alert(response.msg);
        }
    } else {
        const response = await Update();
        if (response.status) {
            alert(response.msg);
        } else {
            alert(response.msg);
        }
    }
});