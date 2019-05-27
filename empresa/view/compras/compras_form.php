<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc" . "/pagarme-php-3/lib/PagarMe.php");
    //require __DIR__.'/pagarme-php/Pagarme.php';
    $apiKey = 'ak_test_z4z0XMkFGZQVMQiw6IVCtIf2lhAkKx';
    $pagarMe =  new \PagarMe\Sdk\PagarMe($apiKey);
    //PagarMe::setApiKey($API_KEY);
    

    $transaction = new PagarMe_Transaction(array(
        "amount" => 10000,
        "card_number" => "4111111111111111",
        "card_cvv" => "123",
        "card_expiration_month" => "09",
        "card_expiration_year" => "22",
        "card_holder_name" => "John Doe",
        "payment_method" => "credit_card",
        "customer" => array(
            "external_id" => "1",
            "name" => "John Doe",
            "type" => "individual",
            "country" => "br",
            "documents" => array(
              array(
                "type" => "cpf",
                "number" => "00000000000"
              )
            ),
            "phone_numbers" => array( "+551199999999" ),
            "email" => "aardvark.silva@pagar.me"
        ),
        "billing" => array(
          "name" => "John Doe",
          "address" => array(
              "country" => "br",
              "street" => "Avenida Brigadeiro Faria Lima",
              "street_number" => "1811",
              "state" => "sp",
              "city" => "Sao Paulo",
              "neighborhood" => "Jardim Paulistano",
              "zipcode" => "01451001"
          )
        ),
        "items" => array(
          array(
            "id" => "ID DO ITEM",
            "title" => "NOME DO ITEM",
            "unit_price" => 10000,
            "quantity" => 1,
            "tangible" => true
          )
        )
      ));

      $transaction->charge();

      var_dump($transaction);










    ////


    require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/empresa" . "/controller/controllerCompras.php");

    $id = $_GET['id'];
    $Controller = new ControllerCompras();
    $produto = $Controller->buscarComprasId($id);
    $nome = $produto->getNome();
    $descricao = $produto->getDescricao();
    $imagem = $produto->getImagem();
    $preco = $produto->getPreco();

?>


        <div class="inputDados">
            <input type="text" name="txtNome" id="txtNome" value="<?php echo $nome;?>" disabled><br>
        </div>
        <div class="inputDados">
            <img class="card_imagem" src='../cms/<?php echo $imagem?>'>
        </div>
        <div class="inputDados">
            <textarea name="txtDescricao" id="txtDescricao" disabled><?php echo $descricao;?></textarea><br>
        </div>
        <div class="inputDados">
            <input type="text" name="txtPreco" id="txtPreco" value="<?php echo 'R$ '.$preco.',00';?>" disabled><br>
        </div>
        
        

