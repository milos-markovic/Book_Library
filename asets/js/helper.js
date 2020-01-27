



// remove alert message
function removeMessage(){

    let message = document.querySelector("#messages");

    if(message){
        setTimeout(function(){ 
            message.remove(); 
        }, 3000);
    }
}

function removeValidateErrors(){

    // let errors = document.querySelector("#validate_errors");

    // if(errors){
    //     setTimeout(function(){ 
    //         errors.remove(); 
    //     }, 3000);
    // }
}

// add more adress fields
function addAddressField(){

  
     let btn_add_Address_filed = document.querySelector("#dodajAdresu");
     let insert_address_field = document.querySelector("#insertAddressField");
     let addressCounter = document.querySelector("#brojacAdresa");

    btn_add_Address_filed.addEventListener('click', function(e){

       e.preventDefault();

       let number_of_addresses = Number(addressCounter.value); 
       let add_address = number_of_addresses += 1;
          
       let div = document.createElement('div');
       div.className = "form-row justify-content-end my-1";
       
       div.innerHTML = `    
                            <div class="col-md-4 addr">
                                <label>Ulica: </label>
                                <input type="text" name="adresa[${add_address}][ulica]" id="street" class="form-control" placeholder="Ulica">
                            </div>
                            <div class="col-md-3 addr">
                                <label>Grad: </label>
                                <input type="text" name="adresa[${add_address}][grad]" id="city" class="form-control" placeholder="Grad">
                            </div>
                            <div class="col-md-3 addr">
                                <label>Država: </label>
                                <input type="text" name="adresa[${add_address}][drzava]" id="country" class="form-control" placeholder="Drzava">
                            </div>
                            <div class="col-md-1">
                                <a href="#" class="btn btn-sm btn-danger btn_delete_address" id="btn-deleteAddress">Obriši</a>
                            </div>
                        `;
    
        insert_address_field.appendChild(div);

        addressCounter.value = add_address;
    })
}


function removeAddressField(){

    let adressSection = document.querySelector('#addressElements');
    
    adressSection.addEventListener('click', function(e){

        if(e.target.classList.contains('btn_delete_address')){

            e.preventDefault();

           let number_of_delete_buttons = document.querySelectorAll('.btn_delete_address').length;

           if(number_of_delete_buttons > 1){

                   let parentRow = e.target.parentElement.parentElement;
                   parentRow.remove();
           }else{
               alert("Morate imati bar jednu adresu");
           }
        }

    });

}




// call functions 

removeMessage();
removeValidateErrors();
//test();

