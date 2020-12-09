const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const path = require('path');
const session = require('express-session');
const PORT = 3000;

//use session
app.use(session({
    secret: 'this is a secret',
    resave: false,
    saveUninitialized: true,
  }))

//let the app read json
app.use(express.json())
app.use(bodyParser.urlencoded({extended: true}));

//set view engine
app.set('view engine', 'ejs');

//use static folder
app.use('/static', express.static(path.join(__dirname, "public")));

//get rigester page
app.get('/register', (req, res)=> {
    res.render('register');
})

//get login page
app.get('/login', (req, res)=> {
    res.render('login', )
})

//get bio page
app.get('/bio', (req, res)=> {
    res.render('bio',{user: req.session.user});
})

//get user data from register
app.post('/register', (req, res)=> {
    let errors = {};
    let data = req.body;
    //validate user data
    if(validateEmpty(data)){
       errors["message"] = "Please supply all fields!";
        return res.render('register', {errors: errors});
    }
    if(validateEmail(data.email)){
        errors["message"] = "Invalid Email!";
        return res.render('register', {errors: errors});
    }
    if(validateEmail(data["confirmed-email"])){
        errors["message"] = "Invalid Email!";
        return res.render('register', {errors: errors});
    }
    if(equalData(data["email"], data["confirmed-email"])){
        errors["message"] = "Email Does'nt match!";
        return res.render('register', {errors: errors});
    }
    if(equalData(data["password"], data["confirmed-password"])){
        errors["message"] = "Email Does'nt match!";
        return res.render('register', {errors: errors});
    }
    
    req.session.user = data;
    res.redirect('/login');
})

//get user info to login
app.post('/login', (req, res)=> {
    const email = req.body.email;
    const password = req.body.password;
    const user = req.session.user;
    if(email == user.email && password == user.password){
        res.redirect('/bio');
        return;
    }
    res.render('login',{error: "Invalid credentials!"});
})

app.listen(PORT, console.log(`Running on port ${PORT}!`));



//validate email 
function validateEmail(email) {
    let regex = "^[\\w-_\\.+]*[\\w-_\\.]\\@([\\w]+\\.)+[\\w]+[\\w]$";
    let match = email.match(regex);
    return (match)? true:false;
}

//check if there is field which is empty
function validateEmpty(data) {
    let keys = [
        "firstname",
        "lastname",
        "email",
        "password",
        "confirmed-password",
        "address",
    ]
    keys.forEach(key => {
        if(data[key] == '') {
            return false;
        }
    })

    return true;
}

function equalData(data, cdata) {
    if(data != cdata){
        return false;
    }
    return true;
}