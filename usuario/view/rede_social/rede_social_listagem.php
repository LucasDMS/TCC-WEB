<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/usuario" . "/controller/controllerRedeSocial.php");

// $controller = new controllerRedeSocial();
// $rs = $controller->buscarTextoPrincipal();

?>

<div class="pagina_titulo">
    Texto Principal
</div>

<!-- Posts -->
<div class="post_wrapper">

	<!-- Post -->
	<div class="post" id="1">
		<img class="post-img" src="./arquivos/usuario.png" alt="coloque o nome do cara aq" title="coloque aqui tbm">
		<span class="post-autor">Carlitos Juanito</span>
		<span class="post-data">23/12/2019 às 11:31</span>
		<p class="post-conteudo">Lorem ipsum dolor, sit amet consectetur olor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiolor, sit amet consectetur adipisiadipisicing elit. Ad, sequi libero obcaecati sint earum repudiandae excepturi adipisci ipsum culpa! Quo unde nemo ut quod doloribus, architecto tempore possimus alias nihil.</p>
		<div class="flex post-acoes">
			<button><i class="far fa-heart"></i></button>
			<button><i class="far fa-comment"></i></button>
		</div>
	</div>

	<!-- Post -->
	<div class="post" id="2">
		<img class="post-img" src="./arquivos/usuario.png" alt="coloque o nome do cara aq" title="coloque aqui tbm">
		<span class="post-autor">Jose Carlos</span>
		<span class="post-data">21/11/2018 às 11:48</span>
		<p class="post-conteudo">Lorem ribus, architecto tempore possimus alias nihil.</p>
		<div class="flex post-acoes">
			<button><i class="fas fa-heart"></i></button>
			<button><i class="fas fa-comment"></i></button>
		</div>
	</div>

	<div class="post" id="3">
		<img class="post-img" src="./arquivos/usuario.png" alt="coloque o nome do cara aq" title="coloque aqui tbm">
		<span class="post-autor">Jose Carlos</span>
		<span class="post-data">21/11/2018 às 11:48</span>
		<p class="post-conteudo">Lorem ribus, architecto tempore possimus alias nihil.</p>
		<div class="flex post-acoes">
			<button><i class="fas fa-heart"></i></button>
			<button><i class="fas fa-comment"></i></button>
		</div>
	</div>

	<div class="post">
		<img class="post-img" src="./arquivos/usuario.png" alt="coloque o nome do cara aq" title="coloque aqui tbm">
		<span class="post-autor">Jose Carlos</span>
		<span class="post-data">21/11/2018 às 11:48</span>
		<p class="post-conteudo">Lorem ribus, architecto tempore possimus alias nihil.</p>
		<div class="flex post-acoes">
			<button><i class="fas fa-heart"></i></button>
			<button><i class="fas fa-comment"></i></button>
		</div>
	</div>

	<div class="post">
		<img class="post-img" src="./arquivos/usuario.png" alt="coloque o nome do cara aq" title="coloque aqui tbm">
		<span class="post-autor">Jose Carlos</span>
		<span class="post-data">21/11/2018 às 11:48</span>
		<p class="post-conteudo">Lorem ribus, architecto tempore possimus alias nihil.</p>
		<div class="flex post-acoes">
			<button><i class="fas fa-heart"></i></button>
			<button><i class="fas fa-comment"></i></button>
		</div>
	</div>

</div>

<script>

$(document).ready(function(){

	$('.post').on('click', function(element){
		//pega o elemento que foi clicado
		const el = element.currentTarget
		
		console.log(el);
		
		const id = el.getAttribute('id')

		console.log(id);
		
	})
})

</script>