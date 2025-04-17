class VisibilityControlOfPasswordFields {
    static PasswordField;
    static PasswordFieldIcon;
    static SetFieldAndIcon(PasswordField = '', PasswordFieldIcon = '') {
        try {
            if (!PasswordField) {
                throw new Error('O parâmetro "PasswordField" é nulo, indefinido ou vazio');
            }
            if (!PasswordFieldIcon) {
                throw new Error('O parâmetro "PasswordFieldIcon" é nulo, indefinido ou vazio');
            }
            this.PasswordField = PasswordField;
            this.PasswordFieldIcon = PasswordFieldIcon;
            return this;
        } catch (error) {
            console.log(error.message());
        }
    }
    static SetDisplayPassword(PasswordFieldVisibility = false, PasswordFieldVisibilityIcon = true) {
        try {
            const PasswordField = document.getElementById(this.PasswordField);
            const PasswordFieldIcon = document.getElementById(this.PasswordFieldIcon);
            if (!PasswordField) {
                throw new Error(`Elemento com id "${this.PasswordField}" não encontrado`);
            }
            if (!PasswordFieldIcon) {
                throw new Error(`Elemento com id "${this.PasswordFieldIcon}" não encontrado`);
            }
            PasswordField.type = (PasswordFieldVisibility) ? 'search' : 'password';
            PasswordFieldIcon.innerHTML = (PasswordFieldVisibilityIcon) ? `<span class="fas fa-eye-slash"></span>` : `<span class="fas fa-eye"></span>`;
            setTimeout(function () {
                PasswordField.type = 'password';
                PasswordFieldIcon.innerHTML = `<span class="fas fa-eye"></span>`;
            }, 3500);
        } catch (error) {
            console.log(error.message());
        }
    }
}
export { VisibilityControlOfPasswordFields };