const express = require('express')
const helmet = require('helmet')
const cors = require('cors')

const app = express()
const rotas = require('./routes')

app.use(express.json())
app.use(express.urlencoded({ extended: true }))
app.use(cors())
app.use(helmet())

app.use('/api', rotas)

module.exports = app
