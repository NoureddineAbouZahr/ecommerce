var lin=document.getElementById("login")
var em=document.getElementById("email")
var password=document.getElementById("pass")
function wlogin(){
    if (!em.value || !password.value){
        alert("empty data!")
    }else{
        let data =new FormData();
        data.append("email",em.value);
        data.append("password",password.value);
        axios({
            method: "post",
            url: "http://127.0.0.1:8000/api/login",
            data: data,
           

        }).then(function (response) {
            // console.log(response);
            // if(response.data["role"]==0){
            //     alert('unauthorized')
            localStorage.setItem('access_token',response.data['access_token']);

            // }
            localStorage.clear();
            localStorage.setItem('access_token',response.data['access_token']);
            // else if(response.data["role"]==1){
                
             location.href='user.html';
            // }

            
        })
    }

}