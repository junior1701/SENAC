const salvar_aluno =
    document.getElementById('btnsalvar');

async function insert() {
    const form = document.getElementById('form');
    const formData = new FormData(form);
    const opt = {
        method: 'POST',
        body: formData
    }
    const response = fetch('cadastro_aluno.php', opt);
}

salvar_aluno
    .addEventListener('click', async () => {
        await insert();
    });