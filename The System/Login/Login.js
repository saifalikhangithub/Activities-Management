
function form_validation_function()
{
    //Select Validation
        let email = document.getElementById("email");
        let password = document.getElementById("password");

        if(email==""||password=="")
        {
            alert("Fill The Form Properly");
            return false;
        }
}
//-----------------------------------------------------------------------------------------------------------------------

        const email = document.getElementById('email');
              email.onkeyup = ()=>{
                  let regex = /^([_\.0-9a-zA-Z]+)@([a-zA-Z]+)\.([a-zA-Z]){2,30}$/;
                  let str = email.value;
                  if(regex.test(str))
                  {   
                    email.classList.remove('is-invalid');
                    email.classList.add('is-valid');   
                  }
                  else
                  {
                    email.classList.add('is-invalid');
                    email.classList.remove('is-valid'); 
                  }
              };



        const password = document.getElementById('password');
              password.onkeyup = ()=>{
                  let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,12}$/;
                  let str = password.value;
                  if(regex.test(str))
                  {    
                    password.classList.remove('is-invalid');
                    password.classList.add('is-valid');   
                  }
                  else
                  {    
                    password.classList.add('is-invalid');
                    password.classList.remove('is-valid');  
                  }
              };
