class ControlAlert {
    static id = '';
    static element;
    static SetId(id = '') { }
    static Success(message = '') { }
    static IsDefault() {

     }
    static Danger(message = '') { }
    static Primary(message = "Processando...", time = 3000) {
        if (!this.element) {
            throw new Error("O elemento alert não foi definido. Use SetId() antes de chamar Primary().");
        }
        // Exibir a mensagem no alerta e definir a classe do Bootstrap
        this.element.className = "alert alert-primary mt-2";
        this.element.innerHTML = message;
        // Retornar uma Promise para garantir que outros métodos só sejam executados após o tempo definido
        return new Promise((resolve) => {
            setTimeout(() => {
                resolve();
            }, time);
        });
    }

}
await ControlAlert.SetId('msg').Primary('Salvando, aguarde...');