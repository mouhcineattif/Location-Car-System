function circle(){
    let sizRandom = Math.random()*19;
    let e = document.createElement("div");
    e.className="circle";
    document.body.appendChild(e);
    e.style.width = 2+sizRandom+ 'px';

    e.style.left=Math.random()* 1500+'px'
    setTimeout(function(){
        document.body.removeChild(e);
    },10000)
}
setInterval(function(){
    circle();
},100)
function square(){
    let sizRandom = Math.random()*19;
    let e = document.createElement("div");
    e.className="square";
    document.body.appendChild(e);
    e.style.width = 2+sizRandom+ 'px';

    e.style.left=Math.random()* 1500+'px'
    setTimeout(function(){
        document.body.removeChild(e);
    },10000)
}
setInterval(function(){
    square();
},100)