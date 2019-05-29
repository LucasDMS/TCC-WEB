
function compra(){
    nome = document.querySelector("#txtNome");
    card_number = document.querySelector("#txtNumeroCartao");
    cvv = document.querySelector("#txtCvv");
    data = document.querySelector("#txtValidade");
    email = document.querySelector("#txtEmail");
    cpfValue = document.querySelector("#txtCPF");
    celularValue = document.querySelector("#txtCelular")
    var res = data.value.split("-");
    var ano = res[0].split("0");
    cpf = removeCaracteres(cpfValue.value);
    celular = removeCaracteres(celularValue.value);
    preco = sessionStorage.getItem('preco') * 1000;
    console.log(cpf)
    console.log(preco)
    console.log("+55"+celular)

    
    
    pagarme.client.connect({ api_key: 'ak_test_pDBOLNZUTnFpoyA1ozEXFPGqfEV7J0' })
    .then(client => client.transactions.create({
        "amount": preco,
        "card_number": card_number.value,
        "card_cvv": cvv.value,
        "card_expiration_date": res[1]+ano[1],
        "card_holder_name": "Morpheus Fishburne",
        "customer": {
            "external_id": "#3311",
            "name": nome.value,
            "type": "individual",
            "country": "br",
            "email": email.value,
            "documents": [
            {
                "type": "cpf",
                "number": cpf
            }
            ],
            "phone_numbers": ["+55"+celular],
            "birthday": "1965-01-01",
        },
        "billing": {
            "name": "Trinity Moss",
            "address": {
                "country": "br",
                "state": "sp",
                "city": "Cotia",
                "neighborhood": "Rio Cotia",
                "street": "Rua Matrix",
                "street_number": "9999",
                "zipcode": "06714360"
            }
        },
        "shipping": {
            "name": "Neo Reeves",
            "fee": 1000,
            "delivery_date": "2000-12-21",
            "expedited": true,
            "address": {
            "country": "br",
            "state": "sp",
            "city": "Cotia",
            "neighborhood": "Rio Cotia",
            "street": "Rua Matrix",
            "street_number": "9999",
            "zipcode": "06714360"
        }
        },
        "items": [
        {
            "id": "r123",
            "title": "Red pill",
            "unit_price": 10000,
            "quantity": 1,
            "tangible": true
        },
        {
            "id": "b123",
            "title": "Blue pill",
            "unit_price": 10000,
            "quantity": 1,
            "tangible": true
        }
        ]
        }))
    .then(
    
    transaction => 
        {if(transaction.status == "paid"){
            alert("Transição realizada com sucesso!!!");
        }   
    }
    )
    .catch( transaction =>  alert("Erro na transição!!!"))
}