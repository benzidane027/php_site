
window.onload =setInterval(async () => {
    let request = await fetch("../get_super_msg.php", {
      method: "post",
    });
    let resualt = await request.json();
    let accepted_table=document.querySelector("#accepted_table");
    if (resualt.msg == "no data") {
        accepted_table.innerHTML = "<tr><td coll>no message</td></tr>";
        return
      } 
    accepted_table.innerHTML="";
    for (items of resualt.msg) {
          let date=String(items[4]).split(" ");
          date=date[0];
          let currunt_day=new Date();
          let mydate=new Date(date)
          let timestmp=Date.now();
          let yestoday_=new Date(timestmp-86400001);
          let seven_days_=new Date(timestmp-86400000*7);
          let last_month_=new Date(timestmp-86400000*30);
         
          let today=currunt_day.getFullYear()+"-"+(currunt_day.getMonth()+1)+"-"+currunt_day.getDate();
          let yestoday=yestoday_.getFullYear()+"-"+(yestoday_.getMonth()+1)+"-"+yestoday_.getDate();
          let seven_days=seven_days_.getFullYear()+"-"+(seven_days_.getMonth()+1)+"-"+seven_days_.getDate();
          let last_month=last_month_.getFullYear()+"-"+(last_month_.getMonth()+1)+"-"+last_month_.getDate();
     // console.log(yestoday);
          var select=document.querySelector("#myselect")
          if(select.value=="today"){
            if(date!=today){
              continue;
            }
          }else if(select.value=="yestesay"){
            if(date!=yestoday){
              continue;
            }
          }else if(select.value=="last_7_day"){
              if(new Date(date)<new Date(seven_days)){
                  continue;
              }
          }else if(select.value=="last_30_day"){
            if(new Date(date)<new Date(last_month)){
              continue;
          }
          }
          //console.log(new Date(date)==new Date(today));
         
          var tr = document.createElement("tr");
          var i = 0;
          for (item of items) {
              if (i != 0) {
                var td = document.createElement("td");
                var text = document.createTextNode(item);
                td.appendChild(text);
                tr.appendChild(td);
              }
            
            i = i + 1;
          }
          accepted_table.appendChild(tr);
        }
  },1000);
