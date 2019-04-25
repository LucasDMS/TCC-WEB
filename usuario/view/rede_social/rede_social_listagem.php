<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/usuario" . "/controller/controllerPost.php");

$controller = new ControllerPost();
$rs = $controller->buscarPosts();

$_SESSION['posts_curtidos'] = [1, 2];

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
	<div class="post" data-id="<?php echo $post->getId() ?>">
		<img class="post-img" src="./<?php echo $post->getAutorFoto() ?>" alt="coloque o nome do cara aq" title="coloque aqui tbm">
		<span class="post-autor"><?php echo $post->getAutor() ?></span>
		<span class="post-data"><?php echo $post->getDtPublicacao() ?></span>
		<p class="post-conteudo"><?php echo $post->getTexto() ?></p>
		<div class="flex post-acoes">
			<button>
				<span class="post-likes"><?php echo $post->getLikes() ?></span>
				<?php	
					foreach($liked as $_SESSION['posts_curtidos']){
						if($post->getId() == $liked) {
					}
				?>
					<i class="fas fa-heart"></i>
				<?php } else { ?>
					<i class="far fa-heart"></i>
				<?php } ?>
			</button>
			<button>
				<i class="far fa-comment"></i>
			</button>
		</div>
		<div class="post-comentarios">
		</div>
	</div>
	<?php 
		}
	?>
</div>

<script>

$(document).ready(function(){

	$('.post').on('click', function(element){
		//pega o elemento que foi clicado
		const el = element.currentTarget
		const id = el.getAttribute('id')

		const url = ''
		$.ajax({ url }).done(function(data){

		})		
	})
})

</script>