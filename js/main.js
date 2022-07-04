const deleteBtn = document.getElementById('delete-product-btn');

deleteBtn.addEventListener('click', () => {
    document.forms['check'].submit();
})