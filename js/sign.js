let signupForm = document.getElementById('signupForm');
        signupForm.addEventListener('submit', (e) => {
            let fullName = document.getElementById('name').value;
            let email = document.getElementById('mail').value; 
            let password = document.getElementById('password').value;
            let phone = document.getElementById('phone').value;
            let confirmPass = document.getElementById('cpassword').value
            let checked = document.getElementById('terms').checked ? true:false;
            if (fullName === '' || email === '' || password === '' || phone === '' || confirmPass === '' || !checked) {
                e.preventDefault();
                document.getElementById('alert').innerHTML = `<div class="alert alert-danger" role="alert">
                All Fields Are required!
                                </div>`
            }
            if(password!==confirmPass){
                e.preventDefault();
                document.getElementById('passLabel').innerHTML = `The Passewords are not the same!`
            }else{
                document.getElementById('passLabel').innerHTML = ``
            }
            if(!checked){
                document.getElementById('termsLabel').innerHTML = `You should accept the Terms before Creating Your Account!`
            }else{
                document.getElementById('termsLabel').innerHTML = ''

            }              
        });