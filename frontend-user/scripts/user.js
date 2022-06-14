
var items=document.getElementById("items");
var filter=document.getElementById("filter")


axios({
    method: 'get',
    url: 'http://127.0.0.1:8000/api/Categories'
}).then(function (response) {
    var catgs = response.data['restos'];
    for (let i = 0; i < catgs.length; i++) {
        let cid = catgs[i]["id"];
        let cname = catgs[i]["name"];
        const option = document.createElement("option");
        option.setAttribute("value", cid);
        option.innerText = cname;
        filter.append(option);
    }
})

axios({
    method: 'get',
    url: 'http://127.0.0.1:8000/api/items',
   
})
.then(function(response){
    
       var iis=response.data['Items'];
    for (let i = 0; i < iis.length; i++) {
        let ciid=iis[i]["id"];
        let iname=iis[i]["name"];  
        let idesc=iis[i]["description"];  
        let iimg=iis[i]["img"];  
        let iprice=iis[i]["price"];  
        let icid=iis[i]["cat_id"];  
        console.log(response.data[i]);
        
        const item=document.createElement("div");
        const tdiv=document.createElement("div");
        item.classList.add("item");
        const img=document.createElement("img");
        const n=document.createElement("p");
        const p=document.createElement("p")
         const fav=document.createElement("p")

        img.src=iimg;
        img.classList.add("imgsize")
        
        n.innerText=iname;
        fav.innerText="❤️";
        fav.classList.add("favremove")
        

        fav.addEventListener('click',function(){
            fav.classList.toggle("favremove")
            fav.classList.toggle("heart")
            let favdata=new FormData();
            favdata.append('u_id',);
            favdata.append('item_id',ciid);
            


            axios({
                method:'post',
                url:'http://127.0.0.1:8000/api/fav/favorite',
                data:favdata,
                headers:{Authorization:`Bearer ${localStorage.getItem('access_token')}`,
            },

            }).then()

            
        
        })
    
        
        
        
        p.innerText=iprice+"$";
        tdiv.classList.add("textdiv")
        tdiv.appendChild(n);
        tdiv.appendChild(fav)
        tdiv.appendChild(p);
        tdiv.classList.add("user")

        item.appendChild(img);
       item.appendChild(tdiv)


        items.appendChild(item);
      // option.setAttribute("value",cid);
        // option.innerText=cname;
        // catSelect.append(option);

        
    }
    
   


})