/* eslint-disable camelcase */
const jwt = require('jsonwebtoken')
const con = require('../db/connection')
const Factory = require('../util/Factory')

class AutenticacaoController {
  logar (req, res) {
    const { login, senha } = req.body

    if (login === undefined || senha === undefined) {
      const json = Factory.gerarResposta(false, 'Falta de parâmetros necessarios', {})
      return res.status(401).json(json)
    }

    const sql = 'select * from tbl_autenticacao where login = ? and senha = ?'
    const parametros = [login, senha]

    con.query(sql, parametros, (erro, resultado) => {
      if (erro) {
        console.log(erro)
      } else {
        if (Array.isArray(resultado) && resultado.length) {
          const { id_autenticacao, login, senha, tipo } = resultado[0]
          const usuarioJson = Factory.gerarUsuario(id_autenticacao, login, senha, tipo)
          const token = jwt.sign({ usuarioJson }, process.env.APP_SECRET)
          const resposta = usuarioJson

          res.set('x-access-token', token)
          res.status(200)
          const json = Factory.gerarResposta(true, 'Autenticado com sucesso', resposta)
          res.json(json)
        } else {
          res.send(Factory.gerarResposta(false, 'Usuário inexistente', {}))
        }
      }
    })
  }
}

module.exports = new AutenticacaoController()
