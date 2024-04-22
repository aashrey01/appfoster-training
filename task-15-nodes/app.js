require('dotenv').config()

const express = require('express')
const session = require('express-session');

const methodOverride=require('method-override')

const expressLayouts = require('express-ejs-layouts')
const flash = require('connect-flash');

const connectDB = require('./server/config/db')


const app = express()

const PORT = process.env.PORT || 5001

app.use(flash());

app.use(express.urlencoded({ extended: true }))
app.use(express.json())
app.use(express.static('public'))

app.use(methodOverride('_method'))


app.use(
    session({
      secret: 'secret',
      resave: false,
      saveUninitialized: true,
      cookie: {
        maxAge: 1000 * 60 * 60 * 24 * 7, // 1 week
      }
    })
  );
  
  // Flash Messages
  app.use(flash({ sessionKeyName: 'flashMessage' }));

app.use(expressLayouts)
app.set('layout', './layouts/main')
app.set('view engine', 'ejs')


//Routes

app.use('/',require('./server/routes/customer'))

// handle 404
app.get('*',(req,res)=>{
    res.status(404).render('404')
})

app.listen(PORT, () => {
    console.log(`App listening on port http://localhost:${PORT}`)
})
