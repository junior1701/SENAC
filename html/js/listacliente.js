
const tabela = new DataTable('#tabela', {
    responsive: true,
    language: {
        url: 'traducao.json',
    }
});

async function Delete(id) {
    const formData = new FormData();
    formData.append('id', id);
    formData.append('action', 'delete');
    const option = {
        method: 'POST',
        body: formData
    };
    const response = await fetch('controllercliente.php', option);
    const json = await response.json();
    if (json.status) {
        $(`#cliente${id}`).remove();
        alert(json.msg);
    } else {
        alert(json.msg);
    }
}