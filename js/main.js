// submit check form
if (document.body.contains(document.getElementById('delete-product-btn'))) {
    const deleteBtn = document.getElementById('delete-product-btn');
    const checkboxForm = document.getElementById('checkbox-form');

    deleteBtn.addEventListener('click', () => {
        // console.log(checkForm);
        checkboxForm.submit();
    })
}


// submit product_form
// const productFormSubmitBtn = document.getElementById('submit-product-form')
// const productForm = document.getElementById('product_form')

// productFormSubmitBtn.addEventListener('click', () => {
//     productForm.submit();
// })




// check all boxes on products list page
if (document.body.contains(document.getElementById('select-all'))) {
    const checkboxes = document.getElementsByClassName('delete-checkbox');
    const selectAll = document.getElementById('select-all');

    selectAll.addEventListener('click', () => {
        if (selectAll.checked == true){
            for (let item of checkboxes) {
                item.checked = true;
            }
        } else {
            for (let item of checkboxes) {
                item.checked = false;
            }
        }
        
    })
}


// form validation
const skuInp = document.getElementById('sku');
const nameInp = document.getElementById('name');
const priceInp = document.getElementById('price');

const saveBtn = document.getElementById('submit-product-form');

saveBtn.addEventListener('click', () => {
    console.log(document.forms['product_form']['sku'].value);
})

