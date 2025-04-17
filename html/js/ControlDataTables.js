class ControlDataTables {
    static Id = '';
    static SetId(value = '') {
        this.Id = value;
        if (!this.Id) {
            throw new Error("O parâmetro 'Id' é nulo, indefinido ou vazio");
        }
        return this;
    }
    static get() { }
    static post(Url = '') {
        try {
            if (!Url) {
                throw new Error('O parâmetro "url" é nulo, indefinido ou vazio');
            }
            return new $("#" + this.Id).DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
                stateSave: true,
                select: true,
                processing: true,
                serverSide: true,
                language: {
                    url: '/js/traducao.json',
                    //'searchPlaceholder': 'Digite sua pesquisa...'
                },
                // Modificação da requisição AJAX para incluir as novas variáveis
                ajax: {
                    url: Url,
                    type: 'POST'
                }
            });
        } catch (error) {
            throw new Error("Ocorreu um erro ao enviar os dados: " + error.message);
        }
    }
}
export { ControlDataTables };