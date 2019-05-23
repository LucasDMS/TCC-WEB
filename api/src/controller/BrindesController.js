/* eslint-disable camelcase */
const con = require('../db/connection')
const Factory = require('../util/Factory')

class EstabelecimentoController {
  select (req, res) {
    const sql = 'SELECT * FROM tbl_brinde'

    con.query(sql, (error, result) => {
      if (!error) {
        res.json(Factory.gerarResposta(true, 'Requisição feita com sucesso', result))
      } else {
        console.log(error)
      }
    })
  }
}

module.exports = new EstabelecimentoController()
