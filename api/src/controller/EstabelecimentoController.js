/* eslint-disable camelcase */
const con = require('../db/connection')
const Factory = require('../util/Factory')

class EstabelecimentoController {
  select (req, res) {
    const sql = 'SELECT * FROM tbl_estabelecimento'

    con.query(sql, (error, result) => {
      if (!error) {
        // TODO buscar isso do banco
        const bebidaFake = {
          id_produto: 1,
          nome: 'Produto teste',
          descricao: 'Descricao teste',
          tamanho: 45,
          modo_preparo: 'teste',
          tempo_producao: 45,
          ipi: 45.00,
          imagem: 'imagens/img.png'
        }

        for (const estabelecimento of result) {
          estabelecimento['bebidas'] = [ bebidaFake ]
        }

        res.json(Factory.gerarResposta(true, 'Requisição feita com sucesso', result))
      } else {
        console.log(error)
      }
    })
  }

  selectID (req, res) {
    const sql = 'SELECT * FROM tbl_estabelecimento where id_estabelecimento = ?'
    const { idEstabelecimento } = req.params

    con.query(sql, idEstabelecimento, (error, result) => {
      if (!error) {
        res.json(Factory.gerarResposta(true, 'Requisição feita com sucesso', { result }))
      } else {
        console.log(error)
      }
    })
  }
}

module.exports = new EstabelecimentoController()
