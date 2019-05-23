/* eslint-disable camelcase */
const con = require('../db/connection')
const Factory = require('../util/Factory')

class PromocoesController {
  select (req, res) {
    const sql = 'SELECT * FROM vw_listar_promocao WHERE apagado = 0 and ativo = 1'

    con.query(sql, (error, result) => {
      if (!error) {
        res.json(Factory.gerarResposta(true, 'Requisição feita com sucesso', result))
      } else {
        console.log(error)
      }
    })
  }

  selectID (req, res) {
    const sql = 'SELECT * FROM vw_listar_promocao where apagado = 0 and id_promocao = ?'
    const { idPromocao } = req.params

    con.query(sql, idPromocao, (error, result) => {
      if (!error) {
        res.json(Factory.gerarResposta(true, 'Requisição feita com sucesso', result[0]))
      } else {
        console.log(error)
      }
    })
  }

  insertUsuarioPromocao (req, res) {
    const sql = 'INSERT INTO tbl_promocao_usuario (id_promocao, id_usuario, ativo) VALUES (?,?,1)'
    const { idPromocao, idUsuario } = req.params

    con.query(sql, [idPromocao, idUsuario], (error, result) => {
      if (!error) {
        res.json(Factory.gerarResposta(true, 'Participação aprovada', result))
      } else {
        console.log(error.sqlMessage)
        res.json(Factory.gerarResposta(false, 'Usuário ou promoção inexistente', []))
      }
    })
  }
}

module.exports = new PromocoesController()
