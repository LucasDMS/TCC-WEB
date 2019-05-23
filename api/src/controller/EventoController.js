/* eslint-disable camelcase */
const con = require('../db/connection')
const Factory = require('../util/Factory')

class EventoController {
  select (req, res) {
    const sql = 'SELECT * FROM vw_eventos_data_format'
    con.query(sql, (error, result) => {
      if (!error) {
        res.json(Factory.gerarResposta(true, 'Requisição feita com sucesso', result))
      } else {
        console.log(error)
      }
    })
  }

  selectID (req, res) {
    const sql = 'SELECT * FROM vw_eventos_data_format WHERE id_eventos = ?'
    const { idEventos } = req.params

    con.query(sql, idEventos, (error, result) => {
      if (!error) {
        res.json(Factory.gerarResposta(true, 'Requisição feita com sucesso', result))
      } else {
        console.log(error)
      }
    })
  }
}

module.exports = new EventoController()
