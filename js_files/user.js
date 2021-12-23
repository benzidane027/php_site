document.querySelector("#send_message").addEventListener("click", async () => {
  if (document.querySelector("#input1").value == "" || document.querySelector("#input2").value=="") {
    document.querySelector("#error_message").innerHTML = "empty field";
    return;
  }

  let request = await fetch("new_message.php", {
    method: "post",
    body: new FormData(document.forms[0]),
  });
  let resualt = await request.json();

  if (resualt.msg == "succ") {
    document.querySelector("#error_message").innerHTML = "sendeng sussuflly";
    document.querySelector("#input1").value = "";
    document.querySelector("#input2").value = "";
  }

 // console.log(resualt);
});

document.querySelector("#serach_btn").addEventListener("click",async () => {
  let data=new FormData();
  //console.log(document.querySelector("#research_key").value);
  
  data.append("name",document.querySelector("#research_key").value)
  let request = await fetch("get_user_msg.php", {
    method: "post",
    body:data
  });
  let resualt = await request.json();
  console.log(resualt);

  if (resualt.msg == "no data") {
    console.log(resualt.msg);
    document.querySelector("#main_table").innerHTML =
      "<tr><td coll>no message</td></tr>";
  } else {
    let table = document.querySelector("#main_table");
    table.innerHTML = "";

    for (items of resualt.msg) {
     // console.log(items);
      var tr = document.createElement("tr");
      var i = 0;
      for (item of items) {
        if (i != 1 && i != 4 && i != 0) {
          //  console.log(item);
        
            var td = document.createElement("td");
            var text = document.createTextNode(item);
            td.appendChild(text);
            tr.appendChild(td);
        }
        i = i + 1;
      }
      table.appendChild(tr);
    }
  }
  
  document.querySelector("#table_container").style.display="block";
})
document.querySelector("#hide_btn").addEventListener("click",async () => {
  document.querySelector("#table_container").style.display="none";

})

let myinput=document.querySelector("#input1");
myinput.addEventListener("input",()=>{
  if(isNaN(String(myinput.value))){
    myinput.value=String(myinput.value).substring(0,String(myinput.value).length-1);
  }
  
})