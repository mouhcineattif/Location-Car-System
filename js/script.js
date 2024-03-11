
let signup = document.getElementById('signup')
signup.addEventListener('submit',(e)=>{
    let fullName = document.getElementById('name').value
    let email = document.getElementById('email').value
    let password = document.getElementById('password').value
    let phone = document.getElementById('phone').value
    let data = [fullName,email,password,phone]
    let good= true
    data.forEach((input)=>{
        if(input==''){
            good = false
        }
        if(!good){
            e.preventDefault
        }
    })
})