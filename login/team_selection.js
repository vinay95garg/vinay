var gkcount=0;
var dfcount=0;
var mfcount=0;
var atcount=0;
var arr,arr1,arr2,arr3;
var gk_count=0;var df_count=0;var mf_count=0;var at_count=0;
var gk_curr_index=new Array(0,0);
var def_curr_index=new Array(0,0,0,0,0);
var mf_curr_index=new Array(0,0,0,0,0);
var at_curr_index=new Array(0,0,0);
var gk_ind,df_ind,mf_ind,att_ind;
var select_team=new Array(0,0,0,0,0,0,0,0,0,0,0);
var del_team=new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
var formation=new Array(4,5,1);
var subs=new Array();
var def_formation=0;
var at_formation=0;
var mf_formation=0;
$(document).ready(function() {
    var budget_id=document.getElementById("budget");
    budget_id.setAttribute("value",110);

  $("#Goal-keeper").click (function() {
        var data;

     if(gkcount%2==0){

        $.ajax({
            type: "GET",
            url: "/login/slim_files/dash_home.php/1",
            success: 
                function(data) {
                    console.log(data);
                     arr=JSON.parse(data);
                    var len=arr["players_name"].length;
                    for(var k=0;k<len;k++){
                       // console.log("hello");
                        var id=document.getElementById("gktable");
                        var row=id.insertRow(k+1);
                        row.className="gk"+(k+1);
                        row.setAttribute("data_id",k+1);


                        row.onclick=(function(){
                                
                                if(gk_count<2){
                                    
                                    var rowno=this.getAttribute("data_id");
                                    var rowid=document.getElementById("select15").rows;

                                    for(var ind=0;ind<2;ind++){
                                        if(gk_curr_index[ind]==0){
                                            gk_ind=ind+1;
                                            gk_curr_index[ind]=1;

                                            
                                            break;
                                        }
                                        


                                    }
                                    var budget_id=document.getElementById("budget");
                                    //console.log(budget_id);
                                    var currvalue=budget_id.getAttribute("value");
                                    //console.log(currvalue);
                                   // console.log(arr["player_cost"][rowno-1]);
                                    //console.log(currvalue-arr["player_cost"][rowno-1]);
                                        if(currvalue-arr["player_cost"][rowno-1]>=0){
                                            budget_id.setAttribute("value",currvalue-arr["player_cost"][rowno-1]);
                                     budget_id.innerHTML=currvalue-arr["player_cost"][rowno-1];   

                                    console.log(gk_ind);
                                    rowid[gk_ind].cells[0].innerHTML=arr["players_name"][rowno-1];
                                    rowid[gk_ind].cells[1].innerHTML="<img src="+"team_logo/item"+arr["club_id"][rowno-1]+".png"+">";

                                    rowid[gk_ind].cells[2].innerHTML=arr["rating"][rowno-1];
                                    rowid[gk_ind].cells[3].innerHTML=arr["player_cost"][rowno-1];
                                    rowid[gk_ind].setAttribute("img_url",arr["img_url"][rowno-1]);
                                    rowid[gk_ind].setAttribute("club_id",arr["club_id"][rowno-1]);
                                    rowid[gk_ind].setAttribute("pl_id",arr["player_id"][rowno-1]);
                                     rowid[gk_ind].setAttribute("cost",arr["player_cost"][rowno-1]);
                                    del_team[gk_ind]=arr["player_id"][rowno-1];
                                    gk_count++;
                                                                          
                                     

                                



                                    }
                                }
                        });

                                                
                           // budget.innerHTML=currvalue-arr["player_cost"][k];
                        var cell1=row.insertCell(0);
                        cell1.innerHTML=arr["players_name"][k];
                        var cell2=row.insertCell(1);
                        cell2.innerHTML="<img src="+"team_logo/item"+arr["club_id"][k]+".png"+">";
                        var cell3=row.insertCell(2);
                        cell3.innerHTML=arr["rating"][k];
                        var cell4=row.insertCell(3);
                        cell4.innerHTML=arr["player_cost"][k];
                        //var budget_id=document.getElementById("budget");
                        //var currvalue=budget_id.innerHTML;
                        //budget.innerHTML=currvalue-arr["player_cost"][k];

                        
                        
                    }
                    
                },
            error: 
                function(err) {
                    console.log(err);
                }
            }); 
        }  
        else{

            var nrows=document.getElementById("gktable").rows.length;
            for(var i=1;i<nrows;i++){
                var id=document.getElementById("gktable");
                id.deleteRow(1);
            }


        }
        gkcount++;
    });

$("#Defenders").click (function() {
        var data;
     if(dfcount%2==0){

        $.ajax({
            type: "GET",
            url: "/login/slim_files/dash_home.php/2",
            data:data,
            success: 
                function(data) {
                    console.log(data);
                     arr1=JSON.parse(data);
                    var len=arr1["players_name"].length;
                    //console.log(len);
                    for(var k=0;k<len;k++){
                        console.log("hello");
                        var id=document.getElementById("defendertable");
                        var row=id.insertRow(k+1);
                        row.className="df"+(k+1);
                        row.setAttribute("data_id",k+1);


                        row.onclick=(function(){
                                
                                if(df_count<5){
                                    
                                    var rowno=this.getAttribute("data_id");
                                    var rowid=document.getElementById("select15").rows;
                                     for(var ind=0;ind<5;ind++){
                                                    if(def_curr_index[ind]==0){
                                                        df_ind=ind+3;
                                                        def_curr_index[ind]=1;
                                                        break;
                                                    }
                                                }
                                   console.log(df_ind);
                                    var budget_id=document.getElementById("budget");
                                    //console.log(budget_id);
                                    var currvalue=budget_id.getAttribute("value");
                                    if(currvalue-arr1["player_cost"][rowno-1]>=0){
                                        budget_id.setAttribute("value",currvalue-arr1["player_cost"][rowno-1]);
                                     budget_id.innerHTML=currvalue-arr1["player_cost"][rowno-1];   
                                    rowid[df_ind].cells[0].innerHTML=arr1["players_name"][rowno-1];
                                    rowid[df_ind].cells[1].innerHTML="<img src="+"team_logo/item"+arr1["club_id"][rowno-1]+".png"+">";
                                    rowid[df_ind].cells[2].innerHTML=arr1["rating"][rowno-1];
                                    rowid[df_ind].cells[3].innerHTML=arr1["player_cost"][rowno-1];
                                    rowid[df_ind].setAttribute("img_url",arr1["img_url"][rowno-1]);
                                    rowid[df_ind].setAttribute("club_id",arr1["club_id"][rowno-1]);
                                    rowid[df_ind].setAttribute("pl_id",arr1["player_id"][rowno-1]);
                                     rowid[df_ind].setAttribute("cost",arr1["player_cost"][rowno-1]);
                                    del_team[df_ind]=arr1["player_id"][rowno-1];

                                    df_count++;
                                    }
                                }
                        });

                        var cell1=row.insertCell(0);
                        cell1.innerHTML=arr1["players_name"][k];
                        var cell2=row.insertCell(1);
                        cell2.innerHTML="<img src="+"team_logo/item"+arr1["club_id"][k]+".png"+">";
                        var cell3=row.insertCell(2);
                        cell3.innerHTML=arr1["rating"][k];
                        var cell4=row.insertCell(3);
                        cell4.innerHTML=arr1["player_cost"][k];
                    }
                    
                },
            error: 
                function(err) {
                    console.log(err);
                }
            }); 
        }  
        else{

            var nrows=document.getElementById("defendertable").rows.length;
            for(var i=1;i<nrows;i++){
                var id=document.getElementById("defendertable");
                id.deleteRow(1);
            }


        }
        dfcount++;
    });


    $("#Midfielders").click (function() {
        var data;
     if(mfcount%2==0){

        $.ajax({
            type: "GET",
            url: "/login/slim_files/dash_home.php/3",
            data:data,
            success: 
                function(data) {
                    console.log(data);
                     arr2=JSON.parse(data);
                    var len=arr2["players_name"].length;
                    console.log(len);
                    for(var k=0;k<len;k++){
                        console.log("hello");
                        var id=document.getElementById("midfieldertable");
                        var row=id.insertRow(k+1);
                         row.className="mf"+(k+1);
                        row.setAttribute("data_id",k+1);


                        row.onclick=(function(){
                                
                                if(mf_count<5){
                                   console.log(mf_count); 
                                    var rowno=this.getAttribute("data_id");
                                    var rowid=document.getElementById("select15").rows;
                                   //console.log(rowid[gk_count+1].cells[0]);
                                   for(var ind=0;ind<5;ind++){
                                                    if(mf_curr_index[ind]==0){
                                                        mf_ind=ind+8;
                                                        mf_curr_index[ind]=1;
                                                        break;
                                                    }
                                                }
                                    var budget_id=document.getElementById("budget");
                                    //console.log(budget_id);
                                    var currvalue=budget_id.getAttribute("value");
                                    if(currvalue-arr2["player_cost"][rowno-1]>=0){
                                    budget_id.setAttribute("value",currvalue-arr2["player_cost"][rowno-1]);
                                     budget_id.innerHTML=currvalue-arr2["player_cost"][rowno-1];       
                                    rowid[mf_ind].cells[0].innerHTML=arr2["players_name"][rowno-1];
                                    rowid[mf_ind].cells[1].innerHTML="<img src="+"team_logo/item"+arr2["club_id"][rowno-1]+".png"+">";
                                    rowid[mf_ind].cells[2].innerHTML=arr2["rating"][rowno-1];
                                    rowid[mf_ind].cells[3].innerHTML=arr2["player_cost"][rowno-1];
                                    rowid[mf_ind].setAttribute("img_url",arr2["img_url"][rowno-1]);
                                    rowid[mf_ind].setAttribute("club_id",arr2["club_id"][rowno-1]);
                                    rowid[mf_ind].setAttribute("pl_id",arr2["player_id"][rowno-1]);
                                     rowid[mf_ind].setAttribute("cost",arr2["player_cost"][rowno-1]);
                                     //console.log(row_id[at_ind].setAttrinbute("cost"));
                                    del_team[mf_ind]=arr2["player_id"][rowno-1];
                                    mf_count++;
                                    }
                                }
                        });

                        var cell1=row.insertCell(0);
                        cell1.innerHTML=arr2["players_name"][k];
                        var cell2=row.insertCell(1);
                        cell2.innerHTML="<img src="+"team_logo/item"+arr2["club_id"][k]+".png"+">";
                        var cell3=row.insertCell(2);
                        cell3.innerHTML=arr2["rating"][k];
                        var cell4=row.insertCell(3);
                        cell4.innerHTML=arr2["player_cost"][k];
                    }
                    
                },
            error: 
                function(err) {
                    console.log(err);
                }
            }); 
        }  
        else{

            var nrows=document.getElementById("midfieldertable").rows.length;
            for(var i=1;i<nrows;i++){
                var id=document.getElementById("midfieldertable");
                id.deleteRow(1);
            }


        }
        console.log("anns");
        mfcount++;
    });


    $("#Attackers").click (function() {
        var data;
     if(atcount%2==0){

        $.ajax({
            type: "GET",
            url: "/login/slim_files/dash_home.php/4",
            data:data,
            success: 
                function(data) {
                    console.log(data);
                     arr3=JSON.parse(data);
                    var len=arr3["players_name"].length;
                    console.log(len);
                    for(var k=0;k<len;k++){
                        console.log("hello");
                        var id=document.getElementById("attackertable");
                        var row=id.insertRow(k+1);
                         row.className="at"+(k+1);
                        row.setAttribute("data_id",k+1);


                        row.onclick=(function(){
                                
                                if(at_count<3){
                                    
                                    var rowno=this.getAttribute("data_id");
                                    var rowid=document.getElementById("select15").rows;
                                   //console.log(rowid[gk_count+1].cells[0]);
                                   for(var ind=0;ind<5;ind++){
                                                    if(at_curr_index[ind]==0){
                                                        at_ind=ind+13;
                                                        at_curr_index[ind]=1;
                                                        break;
                                                    }
                                                }
                                       var budget_id=document.getElementById("budget");
                                    //console.log(budget_id);
                                    var currvalue=budget_id.getAttribute("value");
                                    if(currvalue-arr3["player_cost"][rowno-1]>=0){
                                     budget_id.setAttribute("value",currvalue-arr3["player_cost"][rowno-1]);
                                     budget_id.innerHTML=currvalue-arr3["player_cost"][rowno-1];   
                                    rowid[at_ind].cells[0].innerHTML=arr3["players_name"][rowno-1];
                                    rowid[at_ind].cells[1].innerHTML="<img src="+"team_logo/item"+arr3["club_id"][rowno-1]+".png"+">";
                                    rowid[at_ind].cells[2].innerHTML=arr3["rating"][rowno-1];
                                    rowid[at_ind].cells[3].innerHTML=arr3["player_cost"][rowno-1];
                                    rowid[at_ind].setAttribute("img_url",arr3["img_url"][rowno-1]);
                                    rowid[at_ind].setAttribute("club_id",arr3["club_id"][rowno-1]);
                                    rowid[at_ind].setAttribute("pl_id",arr3["player_id"][rowno-1]);
                                    rowid[at_ind].setAttribute("cost",arr3["player_cost"][rowno-1]);
                                    del_team[at_ind]=arr3["player_id"][rowno-1];
                                    at_count++;
                                    }          
                                }
                        });

                        var cell1=row.insertCell(0);
                        cell1.innerHTML=arr3["players_name"][k];
                        var cell2=row.insertCell(1);
                        cell2.innerHTML="<img src="+"team_logo/item"+arr3["club_id"][k]+".png"+">";
                        var cell3=row.insertCell(2);
                        cell3.innerHTML=arr3["rating"][k];
                        var cell4=row.insertCell(3);
                        cell4.innerHTML=arr3["player_cost"][k];
                    }
                    
                },
            error: 
                function(err) {
                    console.log(err);
                }
            }); 
        }  
        else{

            var nrows=document.getElementById("attackertable").rows.length;
            for(var i=1;i<nrows;i++){
                var id=document.getElementById("attackertable");
                id.deleteRow(1);
            }


        }
        atcount++;
    });
    
 

});


    function del_gk(obj){
        console.log("hello");
      // var id=obj.parent().parent().index;
      var id=obj.parentNode.parentNode;
      var gk_del_ind=id.rowIndex;
       //console.log(id.rowIndex);
       gk_curr_index[gk_del_ind-1]=0;
       id.cells[0].innerHTML=" ";
       id.cells[1].innerHTML=" ";
       id.cells[2].innerHTML=" ";
       id.cells[3].innerHTML=" ";
       var cost_id=document.getElementById("budget");
       var rem_cost=parseInt(cost_id.getAttribute("value")) +parseInt( id.getAttribute("cost"));
       cost_id.innerHTML=rem_cost;
       cost_id.setAttribute("value",rem_cost);
              gk_count--;
        for(var check=0;check<11;check++){
            if(select_team[check]==id.getAttribute("pl_id")){
                //console.log(id.getAttribute("pl_id"));
               select_team[check]="0";
               //select_team[11]="0";
               var gk_del_id=document.getElementById("pl"+check);
               gk_del_id.setAttribute("src","");
               
                break;
            }
            
        }  
        id.setAttribute("club_id","0");
               id.setAttribute("pl_id",0);      
       console.log(select_team);

    }

    function del_df(obj){
        console.log("hello");
      // var id=obj.parent().parent().index;
      var id=obj.parentNode.parentNode;
      var df_del_ind=id.rowIndex;
      
       //console.log(id.rowIndex);
       def_curr_index[df_del_ind-3]=0;
       id.cells[0].innerHTML=" ";
       id.cells[1].innerHTML=" ";
       id.cells[2].innerHTML=" ";
       id.cells[3].innerHTML=" ";
       var cost_id=document.getElementById("budget");
       var rem_cost=parseInt(cost_id.getAttribute("value")) +parseInt( id.getAttribute("cost"));
       cost_id.innerHTML=rem_cost;
       cost_id.setAttribute("value",rem_cost);
              df_count--;
        for(var check=0;check<11;check++){
            if(select_team[check]==id.getAttribute("pl_id")){
                //console.log(id.getAttribute("pl_id"));
               select_team[check]="0";
               //select_team[12]="0";
               var df_del_id=document.getElementById("pl"+check);
               df_del_id.setAttribute("src","");
               //df_del_id.setAttribute("src",null);

                break;
            }
            
        }        
         id.setAttribute("club_id","0");
               id.setAttribute("pl_id",0);  
       console.log(select_team);

    }



    function del_mf(obj){
        console.log("hello");
      // var id=obj.parent().parent().index;
      var id=obj.parentNode.parentNode;
      var mf_del_ind=id.rowIndex;
      
       //console.log(id.rowIndex);
       mf_curr_index[mf_del_ind-8]=0;
       id.cells[0].innerHTML=" ";
       id.cells[1].innerHTML=" ";
       id.cells[2].innerHTML=" ";
       id.cells[3].innerHTML=" ";
       var cost_id=document.getElementById("budget");
       var rem_cost=parseInt(cost_id.getAttribute("value")) + parseInt( id.getAttribute("cost"));
       cost_id.innerHTML=rem_cost;
       cost_id.setAttribute("value",rem_cost);
              mf_count--;
        for(var check=0;check<11;check++){
            if(select_team[check]==id.getAttribute("pl_id")){
                var mf_del_id=document.getElementById("pl"+check);
               mf_del_id.setAttribute("src","");
                //console.log(id.getAttribute("pl_id"));
               select_team[check]="0";

                break;
            }
            
        }        
         id.setAttribute("club_id","0");
               id.setAttribute("pl_id",0);  
       console.log(select_team);

    }



    function del_at(obj){
        //console.log("hello");
      // var id=obj.parent().parent().index;
      var id=obj.parentNode.parentNode;
      var at_del_ind=id.rowIndex;
      
       //console.log(id.rowIndex);
       at_curr_index[at_del_ind-13]=0;
       id.cells[0].innerHTML=" ";
       id.cells[1].innerHTML=" ";
       id.cells[2].innerHTML=" ";
       id.cells[3].innerHTML=" ";
       var cost_id=document.getElementById("budget");
       var rem_cost=parseInt(cost_id.getAttribute("value")) + parseInt( id.getAttribute("cost"));
       cost_id.innerHTML=rem_cost.toString();
       cost_id.setAttribute("value",rem_cost);
       
       
              at_count--;
        for(var check=0;check<11;check++){
            if(select_team[check]==id.getAttribute("pl_id")){
                var at_del_id=document.getElementById("pl"+check);
               at_del_id.setAttribute("src","");
                //console.log(id.getAttribute("pl_id"));
               select_team[check]="0";
                break;
            }
            
        }              
         id.setAttribute("club_id","0");
               id.setAttribute("pl_id",0);  
       //console.log(select_team);

    }

    function ins_gk(obj){
       var id=obj.parentNode.parentNode;
        var url=id.getAttribute("club_id");
        console.log(url);
        var count=0;
        for(var select_gk=0;select_gk<1;select_gk++){
            count=0;
            if(select_team[select_gk]=="0"){
                for(var i=0;i<2;i++){
                    if(id.getAttribute("pl_id")!=select_team[i]){
                        count++;
                    }
                }
                if(count==2)
                {
                    select_team[select_gk]=id.getAttribute("pl_id");
                var gk_ins_id=document.getElementById("pl"+select_gk);
                //console.log("pl"+select_gk);
               gk_ins_id.setAttribute("src","jersey/"+url+".png");        
                break;

                }
                    
            }


         }   
        
        console.log(select_team);
         
            
    }

    function ins_df(obj){
        var id=obj.parentNode.parentNode;
         var url=id.getAttribute("club_id");
         var count=0;
        //select_team[select_df]=id.getAttribute("pl_id");
        for(var select_df=1;select_df<5;select_df++){
            count=0;
            if(select_team[select_df]=="0"){
                 for(var i=1;i<5;i++){
                    if(id.getAttribute("pl_id")!=select_team[i]){
                        count++;
                    }
                }
                if(count==4){

                select_team[select_df]=id.getAttribute("pl_id");
                var gk_ins_id=document.getElementById("pl"+select_df);
                //console.log("pl"+select_df);
               gk_ins_id.setAttribute("src","jersey/"+url+".png");
                break;    
                }
            }
            
        }
       
        
    }


    function ins_mf(obj){
        var id=obj.parentNode.parentNode;
         var url=id.getAttribute("club_id");
         var count=0;
        for(var select_mf=5;select_mf<9;select_mf++){
            count=0;
            if(select_team[select_mf]=="0"){
                 for(var i=5;i<9;i++){
                    if(id.getAttribute("pl_id")!=select_team[i]){
                        count++;
                    }
                }
                if(count==4){

                select_team[select_mf]=id.getAttribute("pl_id");
                var gk_ins_id=document.getElementById("pl"+select_mf);
               gk_ins_id.setAttribute("src","jersey/"+url+".png");
       
                break;    
                }
            }
        
       
        
        }
         console.log(select_team);
    }    



    function ins_at(obj){
        var id=obj.parentNode.parentNode;
        var url=id.getAttribute("club_id");
        var count=0;
        for(var select_at=9;select_at<12;select_at++){
            count=0;
            if(select_team[select_at]=="0"){
                 for(var i=9;i<11;i++){
                    
                    if(id.getAttribute("pl_id")!=select_team[i]){
                        count++;
                    }
                }
                if(count==2){

                select_team[select_at]=id.getAttribute("pl_id");   
                var gk_ins_id=document.getElementById("pl"+select_at);
                //console.log("pl"+select_df);
               gk_ins_id.setAttribute("src","jersey/"+url+".png");
    
                break;    
                }
            }
        

        
        }
        console.log(select_team);
    }

function formation1()
    {

        def_formation=4;
        mf_formation=5;
        at_formation=1;



        var element = document.createElement('link');
        element.href = '1.css';
        element.rel = 'stylesheet';
        element.type = 'text/css';

        document.body.appendChild(element); 
        var id=document.getElementById("f1");
        f1.style.backgroundImage="url('l.png')";
        var id=document.getElementById("f2");
        f2.style.backgroundImage="url('kk.png')"
        var id=document.getElementById("f3");
        f3.style.backgroundImage="url('kkk.png')"
        formation[0]=def_formation;
        formation[1]=mf_formation;
        formation[2]=at_formation;


    }

function formation2()
    {

        def_formation=3;
        mf_formation=4;
        at_formation=3;

        var element = document.createElement('link');
        element.href = '2.css';
        element.rel = 'stylesheet';
        element.type = 'text/css';

        document.body.appendChild(element);    
        var id=document.getElementById("f1");
        f1.style.backgroundImage="url('k.png')";
        var id=document.getElementById("f2");
        f2.style.backgroundImage="url('ll.png')"
        var id=document.getElementById("f3");
        f3.style.backgroundImage="url('kkk.png')"
         formation[0]=def_formation;
        formation[1]=mf_formation;
        formation[2]=at_formation;
    }

function formation3()
    {


console.log("4 4 2");
        
        def_formation=4;
        mf_formation=4;
        at_formation=2;
        var element = document.createElement('link');
        element.href = '3.css';
        element.rel = 'stylesheet';
        element.type = 'text/css';

        document.body.appendChild(element);        
        var id=document.getElementById("f1");
        f1.style.backgroundImage="url('k.png')";
        var id=document.getElementById("f2");
        f2.style.backgroundImage="url('kk.png')"
        var id=document.getElementById("f3");
        f3.style.backgroundImage="url('lll.png')"
         formation[0]=def_formation;
        formation[1]=mf_formation;
        formation[2]=at_formation;

    }



  function final_submit(){
    //console.log(select_team);
    
    var k=0;
    var count=0;
    var temp=new Array(0,0,0,0);
    for(var i=1;i<=15;i++){
        count=0;
        for(var j=0;j<11;j++){
            if(del_team[i]!=select_team[j]){
               count++;
                
            }
        }
       // console.log(count);
        if(count==11){
          //  console.log(i);
            temp[k]=del_team[i];
            k++;
            count=0;
        }
    }

   // console.log(temp);
   // console.log(del_team);
   console.log(select_team);
    $.ajax({
            type: "POST",
            url: "/login/slim_files/dash_home.php/playing11",
            contentType:'application/x-www-form-urlencoded',
            dataType:"JSON",
            data:JSON.stringify(select_team),
            success: 
                function(response) {
                   // console.log(response);
                    //arr=arr.split("}");
                    //arr=arr.spli("")
                    //$("#result").html(arr['1']);
                },
            error: 
                function(err) {
                    console.log(err);
                }
            }); 

    $.ajax({
            type: "POST",
            url: "/login/slim_files/dash_home.php/sub",
            contentType:'application/x-www-form-urlencoded',
            dataType:"JSON",
            data:JSON.stringify(temp),
            success: 
                function(response) {
                   // console.log(response);
                    //arr=arr.split("}");
                    //arr=arr.spli("")
                    //$("#result").html(arr['1']);
                },
            error: 
                function(err) {
                    console.log(err);
                }
            }); 

    $.ajax({
            type: "POST",
            url: "/login/slim_files/dash_home.php/formation",
            contentType:'application/x-www-form-urlencoded',
            dataType:"JSON",
            data:JSON.stringify(formation),
            success: 
                function(response) {
                   console.log(response);
                    //arr=arr.split("}");s
                    //arr=arr.spli("")
                    //$("#result").html(arr['1']);
                },
            error: 
                function(err) {
                    console.log(err);
                }
            }); 

           
        

   }
