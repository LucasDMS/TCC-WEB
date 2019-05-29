const mysql = require('mysql2')

class Connection {
  constructor () {
    try {
      this.con = mysql.createConnection({
        host: process.env.DB_HOST,
        user: process.env.DB_USER,
        password: process.env.DB_PASS,
        database: process.env.DB_SCHEMA
      })
    } catch (erro) {
      console.log(erro)
    }
  }
}

module.exports = new Connection().con
