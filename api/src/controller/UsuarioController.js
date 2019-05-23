/* eslint-disable camelcase */
// const bcrypt = require('bcrypt')
const con = require('../db/connection')
const Factory = require('../util/Factory')

class UsuarioController {
  selectPromocoes (req, res) {

    const sql = 'SELECT * FROM vw_usuario_promocao where id_usuario = ?'
    const { idUsuario } = req.params

    con.query(sql, [idUsuario] ,(error, result) => {
      if (!error) {
        res.json(Factory.gerarResposta(true, 'Requisição feita com sucesso', result))
      } else {
        console.log(error)
        res.json(Factory.gerarResposta(false, "Erro na consulta", []))
      }
    })
  }

  insert(req, res) {

    if ( Object.keys(req.body) != 0 ) {
      // dados que vem da requisição
      const { login, senha, endereco, bairro, cidade, estado, email, nome, cpf, sexo } = req.body
      //TODO: tem que validar isso ae
      const dados = { login, senha, endereco, bairro, cidade, estado, email, nome, cpf, sexo }
      // sql chamando a procedure
      const sql = 'call sp_cadastrar_usuario(?,?,?,?,?,?,?,?,?,?)'
      // valores a serem inseridos
      const values = [dados.login, dados.senha, dados.endereco, dados.bairro, dados.cidade, dados.estado, dados.email, dados.nome, dados.cpf, dados.sexo]
      // executando a query
      con.query(sql, values, (erro, resultado) => {
        // recebe a mensagem que vem da procedure
        const { msg_erro, sucesso } = resultado[0][0]
        // manda a resposta, sendo ela msg de sucesso ou de erro
        sucesso ? res.send(Factory.gerarResposta(true, sucesso, {})) : res.send(Factory.gerarResposta(false, msg_erro, {}))
      })
    } else {
      res.send(Factory.gerarResposta(false,"Falta de informações para cadastro", []))
    }
  }
}

module.exports = new UsuarioController()
