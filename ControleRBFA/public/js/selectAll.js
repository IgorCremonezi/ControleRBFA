function toggleSelectAll(selectAllCheckbox) {
    const select = document.getElementById('empresas_id');
    const options = select && select.options;

    if (options) {
        for (let i = 0; i < options.length; i++) {
            options[i].selected = selectAllCheckbox.checked;
        }
    }
}