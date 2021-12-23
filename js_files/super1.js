document
  .querySelector("#message_checking_button")
  .addEventListener("click", () => {
    document.querySelector("#messages_checking_area").style.display = "block";
    document.querySelector("#messages_accepted__area").style.display = "none";
    document.querySelector("#messages_decline__area").style.display = "none";

  });
document
  .querySelector("#message_accepted_button")
  .addEventListener("click", () => {
    document.querySelector("#messages_checking_area").style.display = "none";
    document.querySelector("#messages_accepted__area").style.display = "block";
    document.querySelector("#messages_decline__area").style.display = "none";
  });

document
  .querySelector("#message_declined_button")
  .addEventListener("click", () => {
    document.querySelector("#messages_checking_area").style.display = "none";
    document.querySelector("#messages_accepted__area").style.display = "none";
    document.querySelector("#messages_decline__area").style.display = "block";
  });
  
window.onload =setInterval(async () => {
  let request = await fetch("../get_all_msg.php", {
    method: "post",
  });
  let resualt = await request.json();
  console.log(resualt);

  let ckeck_tab = document.querySelector("#ckecking_table");
  let decline_tab = document.querySelector("#accept_table");
  let accept_tab = document.querySelector("#decline_table");

  if (resualt.msg == "no data") {
    ckeck_tab.innerHTML = "<tr><td coll>no message</td></tr>";

    decline_tab.innerHTML = "<tr><td coll>no message</td></tr>";

    accept_tab.innerHTML = "<tr><td coll>no message</td></tr>";
  } else {
    ckeck_tab.innerHTML = "";
    decline_tab.innerHTML = "";
    accept_tab.innerHTML = "";

    for (items of resualt.msg) {
      if (items[3] == "checking") {

        //************************************************ */
        
        var tr = document.createElement("tr");
        var i = 0;
        for (item of items) {
          
            if (i == 0) {
              var td = document.createElement("td");
              td.innerHTML ="<button class='mybutton' onclick='remove_line(" + item + ")'>remove</button>"+
              "<button class='mybutton' onclick='accept_line(" + item + ")'>accept</button>"+
              "<button class='mybutton' onclick='declin_line(" + item + ")'>decline</button>";
              tr.appendChild(td);
            } else {
              var td = document.createElement("td");
              var text = document.createTextNode(item);
              td.appendChild(text);
              tr.appendChild(td);
            }
          
          i = i + 1;
        }
        ckeck_tab.appendChild(tr);
        //******************************************************* */
      } else if (items[3] == "accepted") {
        var tr = document.createElement("tr");
        var i = 0;
        for (item of items) {
          
            if (i == 0) {
              var td = document.createElement("td");
              td.innerHTML ="<button class='mybutton' onclick='remove_line(" + item + ")'>remove</button>"+
              "<button class='mybutton' onclick='accept_line(" + item + ")'>accept</button>"+
              "<button class='mybutton' onclick='declin_line(" + item + ")'>decline</button>";
              tr.appendChild(td);
            } else {
              var td = document.createElement("td");
              var text = document.createTextNode(item);
              td.appendChild(text);
              tr.appendChild(td);
            }
          
          i = i + 1;
        }
        accept_tab.appendChild(tr);
      } else if (items[3] == "declined") {
        var tr = document.createElement("tr");
        var i = 0;
        for (item of items) {
          
            if (i == 0) {
              var td = document.createElement("td");
              td.innerHTML ="<button class='mybutton' onclick='remove_line(" + item + ")'>remove</button>"+
              "<button class='mybutton' onclick='accept_line(" + item + ")'>accept</button>"+
              "<button class='mybutton' onclick='declin_line(" + item + ")'>decline</button>";
              tr.appendChild(td);
            } else {
              var td = document.createElement("td");
              var text = document.createTextNode(item);
              td.appendChild(text);
              tr.appendChild(td);
            }
          
          i = i + 1;
        }
        decline_tab.appendChild(tr);
      }
    }
  }
},1000);
async function remove_line(msg_id){
  let data=new FormData();
  data.append("message_id",msg_id)
  let request = await fetch("../delet_message.php", {
    method: "post",
    body: data
  });
  let resualt = await request.json();
  console.log(resualt);
}
async function accept_line(msg_id){
  let data=new FormData();
  data.append("message_id",msg_id)
  data.append("status","accepted")
  let request = await fetch("../change_message_status.php", {
    method: "post",
    body: data
  });
  let resualt = await request.json();
  console.log(resualt);
}
async function declin_line(msg_id){

  let data=new FormData();
  data.append("message_id",msg_id)
  data.append("status","declined")
  let request = await fetch("../change_message_status.php", {
    method: "post",
    body: data
  });
  let resualt = await request.json();
  console.log(resualt);
}