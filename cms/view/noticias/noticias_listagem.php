<?php 

?>

<button type="menu" onclick="callView('noticias','form')">
    NOVO
</button>

<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                NOTÍCIAS
            </th>
        </tr>
        <tr class="tabela_header">
            <th>Nome</th>
            <th>E-mail</th>
            <th>Estado</th>
            <th>Data de envio</th>
            <th>Status</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>CARLIHOS CARLOS</td>
            <td>Nome@gmail.com</td>
            <td>SP</td>
            <td>21/11/1999</td>
            <td>Não lido</td>

            <td>
                <a  onclick="asyncRequest(this)"
                    href="#"
                    data-pagina="noticias"
                    data-url="router.php?controller=noticias&modo=editar"
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-pen"></i>
                </a>
            </td>
            <td>
                <a  onclick="asyncRequest(this)" 
                    href="#"
                    data-pagina="noticias"
                    data-url="router.php?controller=noticias&modo=excluir" 
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
    </tbody>
</table>