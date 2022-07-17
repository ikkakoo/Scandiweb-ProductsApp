// submit check form
if (document.body.contains(document.getElementById('delete-product-btn'))) {
    const deleteBtn = document.getElementById('delete-product-btn');
    const checkboxForm = document.getElementById('checkbox-form');

    deleteBtn.addEventListener('click', () => {
        // console.log(checkForm);
        checkboxForm.submit();
    })
}




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

//sadsadasdasadsa
function setAttributes(el, attrs) {
    for(let key in attrs) {
      el.setAttribute(key, attrs[key]);
    }
  }

function getSelectedValue () {
    let selectedValue = document.getElementById('productType').value;
    let a = document.getElementById('selectedValueInp');
    const furnitureDimensions = document.getElementById('furniture-inputs');
    const size = document.getElementById('#size');
    const weight = document.getElementById('#weight');

    if (selectedValue == 'Book') {
        size.classList.add('hidden')
        furnitureDimensions.classList.add('hidden')
        weight.classList.remove('hidden')
        
    } else if (selectedValue == 'DVD') {
        weight.classList.add('hidden')
        furnitureDimensions.classList.add('hidden')
        size.classList.remove('hidden')
    } else if (selectedValue == 'Furniture') {
        weight.classList.add('hidden')
        size.classList.add('hidden')
        furnitureDimensions.classList.remove('hidden')
    } else {
        weight.classList.add('hidden')
        size.classList.add('hidden')
        furnitureDimensions.classList.add('hidden')
    }

}

