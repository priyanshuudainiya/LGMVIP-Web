// Calling Function For Show The Data 

showData();

// Add Data 

const addBtn = document.querySelector("#form .bttn");


addBtn.onclick = () => {
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let website = document.getElementById("website").value;
    let image = document.getElementById("image").value;
    let gender = document.querySelector('input[name="gender"]:checked').value;
    let html = document.getElementById('html').checked?document.getElementById('html').value:'';
    let css = document.getElementById('css').checked?document.getElementById('css').value:'';
    let java = document.getElementById('java').checked?document.getElementById('java').value:'';

    if(name.trim() != 0 || email.trim() != 0 || gender.trim() != 0 || website.trim() != 0 || image.trim() != 0 || html.trim() != 0 || css.trim() != 0 || java.trim() != 0 ){

        let storage = localStorage.getItem("students");
        if (storage == null) {
            arr = [];
        }else{
            arr = JSON.parse(storage);
        }
        arr.push ({
            "name" : name,
            "email" : email,
            "website" : website,
            "image" : image,
            "gender" : gender,
            "html": html,
            "css": css,
            "java": java,
        });
        localStorage.setItem("students" , JSON.stringify(arr));
        alert("Data Submitted Succesfully.");
    }
    showData();
}

// Show The Data 

function showData() {
    let storage = localStorage.getItem("students");
    if(storage == null){
        arr = [];
    }else {
        arr = JSON.parse(storage);
    }
    if (arr) {
        for(let i=0; i<arr.length; i++){
            let addDiv = document.createElement('div');
            addDiv.className = "card-body";
            addDiv.innerHTML = `<div class="card mb-3 " style="max-width: 540px;">
            <div class="col-lg-4 first">
                <img src="${arr[i].image}" class="img-fluid rounded-start card-img" alt="...">
            </div>
            <div class="col-lg-8 sec">
                
                    <h5 class="card-title"> Description- </h5>
                    <p class="card-text"> 
                        <p>Name : ${arr[i].name}</p>
                        <p>Email : ${arr[i].email}</p>
                        <p>Website : <a href="${arr[i].website}"> ${arr[i].website} </a> </p>
                        <p>Gender : ${arr[i].gender}</p>
                        <p>Skills : ${arr[i].html} &nbsp; ${arr[i].css} &nbsp; ${arr[i].java} </p>
                    </p>
            </div>
            </div>`; 
            document.getElementById("showData").appendChild(addDiv);
        }            
    }
}