const inputbox = document.querySelector(".search input")
const addbtn = document.querySelector(".search button")
const todoList = document.querySelector(".task")
const deleteAllTasks = document.querySelector("footer button");

inputbox.onkeyup = ()=>{
    
  let userData = inputbox.value;
   if(userData.trim() != 0){
       addbtn.classList.add("active"); 

   }
   else{
       addbtn.classList.remove("active");
      
   }
}

showTasks();

// Function FOR ADD TASK

 addbtn.onclick = ()=>{

     let userData = inputbox.value;
     if(userData.trim() != 0){
      let getLocalStorage = localStorage.getItem("New Todo");
      if(getLocalStorage == null){
          listArr = [];
      }
      else{
          listArr = JSON.parse(getLocalStorage); 
      }
      listArr.push(userData);
      localStorage.setItem("New Todo", JSON.stringify(listArr));
     }
     else{
         alert("Enter the some Task, you can't leave this field blank.");
      
     }
    showTasks();
  }


//  Function FOR SHOW THE TASK

 function showTasks(){
    let getLocalStorage = localStorage.getItem("New Todo");
    if(getLocalStorage == null){
        listArr = [];
    }
    else{
        listArr = JSON.parse(getLocalStorage);
    }

    var pendingTask = document.querySelector(".pendingTask");
    pendingTask.textContent = listArr.length;

    let newData = "";
    listArr.forEach((element, index) => {
        newData += `<li> ${element} <span onclick=deleteTask(${index}); ><button>Clear</button></span></li>`;
    });

    todoList.innerHTML = newData;
    inputbox.value ="";

  }

  //  Function FOR CLEAR THE TASK

  function deleteTask(index) {
    let getLocalStorage = localStorage.getItem("New Todo");
    listArr = JSON.parse(getLocalStorage);
    listArr.splice(index,1);

    localStorage.setItem("New Todo", JSON.stringify(listArr));
    showTasks();
}

// Function Of Delete All Data 

deleteAllTasks.onclick = ()=>{
  listArr = [];
  localStorage.setItem("New Todo", JSON.stringify(listArr));
  showTasks();
}