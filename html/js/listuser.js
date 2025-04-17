import { ControlDataTables } from './App.js';

const Update = document.getElementById('btn_atualizar');
//Cria a tabela DataTables com o id 'tabela' e define a URL para o método post
const table = ControlDataTables.SetId('tabela').post('/usuario/userfilter');

Update.addEventListener('click', async () => {
    // false para não resetar a paginação
    table.ajax.reload(null, false); 
});