function validateForm() {
    var val_name = document.forms["form"]["name"].value;
    var val_email = document.forms["form"]["email"].value;
    var val_topic = document.forms["form"]["topic"].value;
    var val_content = document.forms["form"]["content"].value;
    
    if (val_name === null || val_name === "") 
    {
        alert("Fill Name !");
        return false;
    }
   
    if (val_email === null || val_email === "") 
    {
        alert("Fill Email !");
         return false;
    }

    if (val_topic === null || val_topic === "") 
    {
        alert("Fill Question Topic !");
        return false;
    }
    
    if (val_content === null || val_content === "")
    {
         alert("Fill Content !");
         return false;
    }
             
    return true;

}

 