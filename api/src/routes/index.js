const router = require('express').Router()
const AutenticacaoController = require('../controller/AutenticacaoController')

const EventoController = require('../controller/EventoController')
const EstabelecimentoController = require('../controller/EstabelecimentoController')
const UsuarioController = require('../controller/UsuarioController')
const ProdutosController = require('../controller/ProdutosController')
const PromocoesController = require('../controller/PromocoesController')
const BrindesController = require('../controller/BrindesController')
const PopsSocialController = require('../controller/PopsSocialController')
const NotificacaoController = require('../controller/NotificacaoController')

const verificarSessao = require('../middleware/sessao')
// Autenticar
router.route('/autenticacao')
  .post(AutenticacaoController.logar)
// Cadastrar novo
router.route('/usuario')
  .post(UsuarioController.insert)

router.route('/usuario/:idUsuario/promocao')
  .get(UsuarioController.selectPromocoes)
// Listar todos
router.route('/promocao')
  .get(PromocoesController.select)

router.route('/promocao/:idPromocao')
  .get(PromocoesController.selectID)

router.route('/promocao/:idPromocao/:idUsuario')
  .post(PromocoesController.insertUsuarioPromocao)

router.route('/brinde')
  .get(BrindesController.select)

router.route('/produto')
  .get(ProdutosController.select)

router.route('/estabelecimento')
  .get(verificarSessao, EstabelecimentoController.select)

router.route('/estabelecimento/:idEstabelecimento')
  .get(verificarSessao, EstabelecimentoController.selectID)

router.route('/post')
  .get(PopsSocialController.select)

router.route('/post/:idPost')
  .get(PopsSocialController.selectID)

router.route('/evento')
  .get(EventoController.select)

router.route('/evento/:idEventos')
  .get(EventoController.selectID)

router.route('/notificacao')
  .post(NotificacaoController.send)

module.exports = router
