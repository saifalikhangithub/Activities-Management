
function form_validation_function()
{
    //Select Validation
        let f_name = document.getElementById("first_name");
        let l_name = document.getElementById("last_name");
        let email = document.getElementById("email");
        let password = document.getElementById("password");
        let c_password = document.getElementById("c_password");
        let mob_number = document.getElementById("mobile_number");
        let country = document.getElementById("country");
        if(f_name==""||l_name==""||email==""||password==""||c_password==""||mob_number==""||country.value == "")
        {
            alert("Fill The Form Properly");
            return false;
        }
    
    
    //Radio Button Validation
        let gender_value = document.getElementsByName('gender');
        let the_gender = false;
        for(let i=0; i<gender_value.length;i++)
        {
            if(gender_value[i].checked == true)
            {
                the_gender = true;
                break;
            }
        }
        if(!the_gender){alert("Choose Your Gender"); return false;}


    //CheckBox Validation
        let checkbox_value = false;
        if(document.getElementById("coding").checked){checkbox_value==true;}
        else if(document.getElementById("driving").checked){checkbox_value==true;}
        else if(document.getElementById("gaming").checked){checkbox_value==true;}
        else if(document.getElementById("nothing").checked){checkbox_value==true;}
        else {alert("Select Your Likes"); return false};


    //I Agree Terms And Condition 
        let agree = document.getElementById('t_and_c').checked;
        if(!agree){alert('Checkbox not checked'); return false;}

}
//-----------------------------------------------------------------------------------------------------------------------


        const first_name = document.getElementById('first_name');
              first_name.onkeyup = ()=>{
                  let regex = /^[a-zA-Z]+( [a-zA-Z]+)*$/;
                  let str = first_name.value;
                  if(regex.test(str))
                  {
                    first_name.classList.remove('is-invalid');
                    first_name.classList.add('is-valid');  
                  }
                  else
                  {
                    first_name.classList.add('is-invalid');
                    first_name.classList.remove('is-valid');  
                  }
              };

        const last_name = document.getElementById('last_name');
              last_name.onkeyup = ()=>{
                  let regex = /^[a-zA-Z]+( [a-zA-Z]+)*$/;
                  let str = last_name.value;
                  if(regex.test(str))
                  {
                    last_name.classList.remove('is-invalid');
                    last_name.classList.add('is-valid');   
                  }
                  else
                  {
                    last_name.classList.add('is-invalid');
                    last_name.classList.remove('is-valid');  
                  }
              };



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

        const c_password = document.getElementById('c_password');
              c_password.onkeyup = ()=>{
                  let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,12}$/;
                  let str = c_password.value;
                  if(regex.test(str))
                  {    
                    c_password.classList.remove('is-invalid');
                    c_password.classList.add('is-valid');  
                  }
                  else
                  {    
                    c_password.classList.add('is-invalid');
                    c_password.classList.remove('is-valid');  
                  }
              };



        const mobile_number = document.getElementById('mobile_number');
              mobile_number.onkeyup = ()=>{
                  let regex = /^([0-9]){10,10}$/;;
                  let str = mobile_number.value;
                  if(regex.test(str))
                  {
                    mobile_number.classList.remove('is-invalid');
                    mobile_number.classList.add('is-valid');   
                  }
                  else
                  {    
                    mobile_number.classList.add('is-invalid');
                    mobile_number.classList.remove('is-valid');  
                  }
              };