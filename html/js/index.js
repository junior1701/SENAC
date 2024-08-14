const salvar = document.getElementById('salvar');
const cep = document.getElementById('cep');
async function BuscaCep(zipCode) {
    //Monstamos o endereço da URL.
    const url = `https://viacep.com.br/ws/${zipCode}/json/`;
    //Exibimos o string da URL.
    try {
        const response = await fetch(url, {
            method: "GET"
        });
        if (response.ok != true) {
            throw new Error(`Restrição: ${response.status}`);
        }
        return await response.json();
    } catch (error) {
        throw new Error('Restrição: ' + error.message);
    }
}
cep.addEventListener('blur', async () => {
    const zipCode = cep.value.replace('-', '');
    if (zipCode === '' || zipCode === undefined) {
        return;
    }
    const response = await BuscaCep(zipCode);
    document.getElementById('endereco').value = response.logradouro;
    document.getElementById('cidade').value = response.localidade;
    document.getElementById('bairro').value = response.bairro;
    document.getElementById('uf').value = response.uf;
    document.getElementById('ibge').value = response.ibge;
});
salvar.addEventListener('click', async () => {

});