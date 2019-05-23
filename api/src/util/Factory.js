/* eslint-disable camelcase */
class Factory {
  gerarResposta (boolean, string, object) {
    return { sucesso: boolean, mensagem: string, resposta: object }
  }

  gerarUsuario (id_autenticacao, login, senha, tipo) {
    return { id_autenticacao, login, senha, tipo }
  }
}

module.exports = new Factory()
