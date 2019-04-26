<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/usuario" . "/controller/controllerPost.php");

$controller = new ControllerPost();
$rs = $controller->buscarPosts();

$_SESSION['id_posts_curtidos'] = [5, 4];
$idPostsCurtidos = $_SESSION['id_posts_curtidos'];

function verificaPostCurtido($idPost, $idPostsCurtidos){
	$tipoCorcao = '';
	foreach($idPostsCurtidos as $idPostCurtido){
		if($idPost == $idPostCurtido){
			$tipoCorcao = true;
			break;
		}
		$tipoCorcao = false;
	}
	return $tipoCorcao;
}
?>

<div class="pagina_titulo">
  Texto Principal
</div>

<!-- Posts -->
<div class="post_wrapper">

	<?php
		foreach($rs as $index=>$post){
	?>
	<!-- Post -->
	<div class="post">
		<div class="post-container" id="post_<?php echo $post->getId() ?>">
			<img class="post-img" 
						src="./<?php echo $post->getAutorFoto() ?>" 
						alt="<?php echo $post->getAutor() ?>" 
						title="<?php echo $post->getAutor() ?>">

			<span class="post-autor"><?php echo $post->getAutor() ?></span>
			<span class="post-data"><?php echo $post->getDtPublicacao() ?></span>
			<p class="post-conteudo"><?php echo $post->getTexto() ?></p>

		</div>
		
		<!-- Comentarios -->
		<div class="post-comentarios">
			<!-- Comentario -->
			<div class="post-comentario">
				<div class="post-comentario-autor">
					Comentario
				</div>
			</div>
		</div>

		<div class="flex post-acoes">
			<button>
				<span class="post-likes"><?php echo $post->getLikes() ?></span>

				<?php	if(verificaPostCurtido($post->getId(), $idPostsCurtidos)){ ?>
					<i class="fas fa-heart"></i>
				<?php } else {?>
					<i class="far fa-heart"></i>
				<?php } ?>
				
			</button>
			<button>
				<i class="far fa-comment"></i>
			</button>
		</div>
	</div>
	<?php 
		}
	?>
</div>

<script>

$(document).ready(function(){

	//Mostrar comentarios
	$('.post-container').on('click', function(element){
		//pega o elemento que foi clicado
		const el = element.currentTarget
		const id = el.getAttribute('id')
		const idNum = id.split('_')[1]
		const elPai = document.getElementById(id).parentElement
		const elComentarios = elPai.children[1]
		elComentarios.style.height = '100px'

		console.log(idNum);
		
		const url = ''
		$.ajax({ url }).done(function(data){

		})		
	})
})

</script>