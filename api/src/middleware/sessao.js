const Factory = require('../util/Factory')
const jwt = require('jsonwebtoken')

function verificarSesssao (req, res, next) {
  const token = req.headers['x-access-token']

  if (token) {
    try {
      jwt.verify(token, process.env.APP_SECRET)

      next()
    } catch (error) {
      res
        .status(403)
        .send(Factory.gerarResposta(false, 'Token inválido', {}))
    }
  } else {
    res
      .status(403)
      .send(Factory.gerarResposta(false, 'Acesso negado', {}))
  }
}

module.exports = verificarSesssao
