var lin=document.getElementById("login")
var em=document.getElementById("email")
var password=document.getElementById("pass")
function wlogin(){
    let data =new FormData();
    data.append("email",em.value);
    data.append("password",password.value);
    axios({
        method: "post",
        url: "http://127.0.0.1:8000/api/login",
        data,
        

    }).then(function (response) {
        // console.log(response);
        // if(response.data["role"]==0){
        //     alert('unauthorized')
        // }
        // console.log(response.data.email);
        localStorage.clear();
        localStorage.setItem('access_token',response.data['access_token']);
        // else if(response.data["role"]==1){
            
            location.href='user.html';
        // } 
    }).catch(function(error) {
        displayError(error)
    })

}
var sname = document.getElementById('name');
var semail = document.getElementById('e-mail');
var spas = document.getElementById('pas');
var scpas = document.getElementById('cpas');
function signup(){
    var data = new FormData();
    data.append('name', sname.value);
    data.append('email', semail.value);
    data.append('password', spas.value);
    data.append('password_confirmation',scpas.value);
    axios({
        method: 'post',
        url:"http://127.0.0.1:8000/api/register",
        data:data,
    }).catch(function(error) {
        displayError(error)
    }).then (function(response){
        localStorage.clear();
        localStorage.setItem('access_token',response.data['access_token']);
    })
}
function displayError(error) {
    var str = '';
    for (const key in error.response.data) {
        str += error.response.data[key][0] + '\n';           
    }
    alert(str);
}