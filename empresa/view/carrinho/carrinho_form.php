<?php
    require('vendor/autoload.php');
    
    $pagarme = new PagarMe\Client('ak_test_pDBOLNZUTnFpoyA1ozEXFPGqfEV7J0');
    
    $transaction = $pagarme->transactions()->create([
      'amount' => 1000,
      'payment_method' => 'boleto',
      'async' => false,
      'customer' => [
        'external_id' => '1',
        'name' => 'Nome do cliente',
        'type' => 'individual',
        'country' => 'br',
        'documents' => [
          [
            'type' => 'cpf',
            'number' => '00000000000'
          ]
        ],
        'phone_numbers' => [ '+551199999999' ],
        'email' => 'cliente@email.com'
      ]
    ]);
    

      $transaction->charge();

      var_dump($transaction);
    ////

require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/empresa" . "/controller/controllerCarrinho.php");


    $descricao = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $Controller = new ControllerCarrinho();
        $carrinho = $Controller->buscarCarrinho($id);
        $action = "router.php?controller=cadastro_carrinho&modo=atualizar";
        $modo = "atualizar";
        $descricao = $carrinho->getDescricao();
        
    }
?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action;?>"
        method="post"
        autocomplete="off"
        id="frm_carrinho"
        enctype='multipart/form-data' 
        name="frm_carrinho"
        class="form_padrao"
        data-id="<?php echo $id; ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="marketing">

        <div class="inputDados">
            <label from="txtDescricao">Descrição</label>
            <textarea name="txtDescricao" id="txtDescricao" required><?php echo $descricao ?></textarea>
       
        </div>
        <div class="inputDados">
            <input type="file" name="img" id="img"><br>
        </div>
        <div class="flex flex-center">
            <button type="reset" class="btn btn-clear">
                <i class="fas fa-eraser"></i>
            </button>

            <button class="btn btn-submit">
                <i class="fas fa-save"></i>
            </button>
        </div>

</form>