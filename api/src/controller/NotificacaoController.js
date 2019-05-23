const admin = require('firebase-admin')
const Factory = require('../util/Factory')

const serviceAccount = require('../config/serviceAccountKey.json')

admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  databaseURL: 'https://tcc-pops-app.firebaseio.com'
})

class EstabelecimentoController {
  send (req, res) {
    const { titulo, mensagem } = req.body

    const topic = 'all'

    const payload = {
      notification: {
        title: titulo,
        body: mensagem
      },
      topic
    }

    admin.messaging().send(payload)
      .then(function (response) {
        console.log('Sucesso: ', response)

        res.send(Factory.gerarResposta(true, response, []))
      })
      .catch(function (error) {
        console.log('Erro ', error)

        res.send(Factory.gerarResposta(false, error, []))
      })
  }
}

module.exports = new EstabelecimentoController()
