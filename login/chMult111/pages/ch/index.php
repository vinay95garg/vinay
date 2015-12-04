 <?php

  session_start();
?>

<head>
  
  <script type="text/javascript"> if (!window.console) console={log: function() {} };</script>
</head>
<body>
  <header>
    <h3>MULTIPLAYER GAME</h3>
  </header>
  <input type="submit" onclick="parent.location='../indexmult.php'" id="deleteGame-submit" value="New Opponent">
  <h2>Welcome<span style="color:green"><?php echo $_SESSION['UserName'];?>!</span>You are playing against <span style="color:red"><?php echo $_SESSION['Opponent'];?></span>
  </h2>
  <div id="FenInDiv" style="display:none;">
    <input type="text" id="fenIn"/>
    <button type="button" id="SetFen">Set Position</button>
  </div>
  <div id="ThinkingImageDiv">
  </div>
  <div id="Board">
  </div>
  <div id="CurrentFenDiv">
    <span id="currentFenSpan" style="display:none;"></span>
  </div>
  <div id="ChatMessages">
  </div>
  <div id="AvailablePlayers"></div>
  <div id="ChatMessages"></div>
  <div id="ChatBig">
    <span style="color:green">Chat</span><br/>
    <textarea id="ChatText" name="ChatText"></textarea>
  </div>
  <button type="button" id="NewGameButton">New Game</button><br/>
  <span id="GameStatus" ></span>
  <div id="EngineOutput"><br/>

  <!DOCTYPE html>
<html lang="en">

<head>

    
    <script src="../../js/jquery.js"></script>
   

   <!-- <script type="text/javascript" src="../../js/chatboxInGame.js"></script>

   <!-- <script type="text/javascript" src="../../js/multi.js"></script>-->


    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.5/material.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
var cell1,cell2,cell3,cell4,cell5;
var cell11,cell21,cell31,cell41,cell51;
var arr3;   
var count=0;
var j;
var count1=0;
var arr1;
var arr;
var arr2;
var arr3;
var arr5;
var arr6;
var length;
var id;
var len;
var gk2=new Array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

var gk=new Array(0,0,0,0,0,0,0,0,0,0,0);
var gk1=new Array(0,0,0,0,0,0,0,0,0,0,0);
var select_team1=new Array(0,0,0,0,0,0,0,0,0,0,0);
var select_team=new Array(0,0,0,0,0,0,0,0,0,0,0);
var ratingopp=new Array(0,0,0,0,0,0,0,0,0,0,0);
var ratinguser=new Array(0,0,0,0,0,0,0,0,0,0,0);
var count=0;
var count2=0;
var user=0;
var opp=0;
var count3=0;
var select_team3=new Array(0,0,0,0,0,0,0,0,0,0,0);
var counter=0;

var sum=0;
var arr5;
var arr6;





$(document).ready(function()
{

 teamopp();
    $.ajax({
           type: "GET",
            url: "/login/slim_files/start2.php",
             success: 
                function(data) {
                    //console.log(data);
                    var arr=JSON.parse(data);

                     console.log(arr);
                     var len=arr["players_name"].length;
                     console.log(len);

for(k=0;k<len;k++)
{
                     var id=document.getElementById("select15");
                        var row=id.insertRow(k+1);
                        count++;
                        gk[count]=row;
                        

                        var cell1=row.insertCell(0);
                        cell1.innerHTML=arr["players_name"][k];
                                               // console.log("hello");
                        var cell2=row.insertCell(1);
                           cell2.innerHTML=arr["club_id"][k];
                    
                        var cell3=row.insertCell(2);
                        cell3.innerHTML=arr["rating"][k];
                         ratingopp[k]=arr["rating"][k];
                        //console.log(select_team[k]);


                        var cell4=row.insertCell(3);
                        cell4.innerHTML=arr["player_cost"][k];
                        var cell5=row.insertCell(4);
                        cell5.innerHTML=arr["player_id"][k];
                             select_team[k]=arr["player_cost"][k];




                    }



}





});       

});




$(document).ready(function()
 {
//  
teamuser();

    $.ajax({
           type: "GET",
            url: "/login/slim_files/start.php",
             success: 
                function(data) {
                    //console.log(data);
                    var arr3=JSON.parse(data);

                    // console.log(arr3);
                     var len=arr3["players_name"].length;
                   //  console.log(len);

for(k=0;k<len;k++)
{
                     var id=document.getElementById("select151");
  //console.log(id);
                        var row=id.insertRow(k+1);
     
                        count1++;
                        gk1[count1]=row;

                        
                      //  console.log(gk1[1]);     


                        var cell11=row.insertCell(0);
                        cell11.innerHTML=arr3["players_name"][k];
                        var cell21=row.insertCell(1);
                           cell21.innerHTML=arr3["club_id"][k];
                    
                        var cell31=row.insertCell(2);
                        cell31.innerHTML=arr3["rating"][k];
                        ratinguser[k]=arr3["rating"][k];
                      //  console.log(select_team1[k]);

                        var cell41=row.insertCell(3);
                        cell41.innerHTML=arr3["player_cost"][k];
                        var cell51=row.insertCell(4);
                        cell51.innerHTML=arr3["player_id"][k];
                        select_team1[k]=arr3["player_cost"][k];

  //   console.log(ratinguser[k]);
    //  console.log(ratingopp[k]); 

      if(ratinguser[k]>ratingopp[k])
      {
        user++;
  
      }
      else
      {
        opp++;
      }




  


}
}
});
});


function teamuser()
{

  var delay=6000;
setInterval(function()
{
$(document).ready(function()
 {
  
  
var id=document.getElementById("select151");
     
    
      for(var i=11;i>0;i--)
      {        
           id.deleteRow(i);
       }          

    $.ajax({
           type: "GET",
            url: "/login/slim_files/start.php",
             success: 
                function(data) {
                    //console.log(data);
                    var arr3=JSON.parse(data);

                     //console.log(arr3);
                     var len=arr3["players_name"].length;
                     //console.log(len);

for(k=0;k<len;k++)
{
                     var id=document.getElementById("select151");
                        var row=id.insertRow(k+1);
                        count1++;
                        gk1[count1]=row;
                        
                      //  console.log(gk1[1]);     


                        var cell11=row.insertCell(0);
                        cell11.innerHTML=arr3["players_name"][k];
                        var cell21=row.insertCell(1);
                           cell21.innerHTML=arr3["club_id"][k];
                    
                        var cell31=row.insertCell(2);
                        cell31.innerHTML=arr3["rating"][k];
                        ratinguser[k]=arr3["rating"][k];
                      //  console.log(select_team1[k]);

                        var cell41=row.insertCell(3);
                        cell41.innerHTML=arr3["player_cost"][k];
                        var cell51=row.insertCell(4);
                        cell51.innerHTML=arr3["player_id"][k];
                        select_team1[k]=arr3["player_cost"][k];
                        
            
//console.log(gk1[1]);

                    row.onclick=(function(){
                      location.reload(); 
                      teamuser();
       teamopp();
   console.log("func2");
    console.log("fnebvhjhj");
var i=$(this).index();
     //var i= row.parentNode;
     //console.log(row.index);
  //  var j=i.rowIndex;
                          console.log(i);
  //   console.log(j);
      ChatText=select_team1[i-1];

      console.log(ChatText);

      $.ajax({
        type:'POST',
        url:'../mutli.php',
        data:{ChatText:ChatText},
        success:function() {
       
       counter++;
      //  sum=ratinguser[i-1]+sum;
        //     


   $.ajax({
           type: "GET",
            url: "/login/slim_files/start3.php",
            success:   
            function(data) {
                    //console.log(data);
                    var arr5=JSON.parse(data);

   
    $.ajax({
           type: "GET",
            url: "/login/slim_files/start4.php",
            success:   
            function(data) {
                    //console.log(data);
                    var arr6=JSON.parse(data);
                    console.log(counter);



                     console.log(arr6);
console.log(user);
console.log(opp);
console.log(arr5);




                     if(counter==11)
                   {
                    if(user>opp)
                    {
                     /// alert('MATCH WON BY' + arr5 + ' );
                      alert('MATCH WON BY ' + arr5 + ' against ' + arr6 + '.');
                    }
                    else
                    {
                      alert('MATCH WON BY ' + arr6 + ' against ' + arr5 + '.');
                     // alert("opp win");
                    }
                   }
               
               }


});

                    //  console.log(arr5);
                 }


});
                   
     }
   })
    })



}
}
});
});




},delay);
}

function teamopp()
{

  var delay=10000;
setInterval(function()
{

$(document).ready(function()
{
var id=document.getElementById("select15");
     
       
      for(var i=11;i>0;i--)
      {        
           id.deleteRow(i);
       }       
  
    $.ajax({
           type: "GET",
            url: "/login/slim_files/start2.php",
             success: 
                function(data) {
                    //console.log(data);
                    var arr=JSON.parse(data);

                     //console.log(arr);
                     var len=arr["players_name"].length;
                    // console.log(len);

for(k=0;k<len;k++)
{
                     var id=document.getElementById("select15");
                        var row=id.insertRow(k+1);
                        count++;
                        gk[count]=row;
                        

                        var cell1=row.insertCell(0);
                        cell1.innerHTML=arr["players_name"][k];
                                               // console.log("hello");
                        var cell2=row.insertCell(1);
                           cell2.innerHTML=arr["club_id"][k];
                    
                        var cell3=row.insertCell(2);
                        cell3.innerHTML=arr["rating"][k];
                         ratingopp[k]=arr["rating"][k];
                        //console.log(select_team[k]);


                        var cell4=row.insertCell(3);
                        cell4.innerHTML=arr["player_cost"][k];
                        var cell5=row.insertCell(4);
                        cell5.innerHTML=arr["player_id"][k];
                             select_team[k]=arr["player_cost"][k];


     

                    }



}





});       

});



},delay);
}


     



          </script>



























<style type="text/css">

#select15 td,#select151 td
{
color: white; 

}
#select151 td
{
color: white; 
}
#select4 td
{
color: white; 
}
.table2
{

margin-left: 980px;
margin-top: -445px;
height:1100px;
width: 340px;
text-align: center;
}
</style>
<!-- Table goes in the document BODY -->




<style>
body{
    text-align: center;
    background: #00ECB9;
  font-family: sans-serif;
  font-weight: 100;
}

h1{
  color: #396;
  font-weight: 100;
  font-size: 40px;
  margin: 40px 0px 20px;
}


.smalltext{
    padding-top: 5px;
    font-size: 16px;
}




body {
    background: url(9.jpg);
    background-attachment: fixed;
    font-family: 'Open Sans', sans-serif;
    color: #4e4e4e;
    line-height: 22px;
}


#panel,#panel1,#panel2,#panel3,#select15 {
    margin:0px;
    padding:0px;
    width:100%;
    border:1px solid rgba(126, 154, 94, 0.52);
    
    }

#panel,#panel1,#panel2,#panel3,#select151 {
    margin:0px;
    padding:0px;
    width:100%;
    border:1px solid rgba(126, 154, 94, 0.52);
    
    }

#select15 tr:hover td
{
background-color:grey;
}
#select151 tr:hover td
{
background-color:grey;
}

#select15 td
{
height: 20px;
width: 70px;
}
#select151 td
{
height: 20px;
width: 70px;
}

#select15 th,#select15 td{
    vertical-align:middle;
    
    background-color:rgba(48, 48, 51, 0.69);

    border:2px solid rgba(122, 197, 36, 0.12);
    border-width:0px 1px 1px 0px;
    text-align:center;
    padding:7px;
    font-size:12px;
    font-family:Arial;
    font-weight:normal;
    color: rgba(18, 19, 18, 0.77);
}

#select151 th,#select151 td{
    vertical-align:middle;
    
    background-color:rgba(48, 48, 51, 0.69);

    border:2px solid rgba(122, 197, 36, 0.12);
    border-width:0px 1px 1px 0px;
    text-align:center;
    padding:7px;
    font-size:12px;
    font-family:Arial;
    font-weight:normal;
    color: rgba(18, 19, 18, 0.77);
}
#select15 th
{
color: rgba(64, 144, 169, 0.78);
font-size: 14px;
}
#select151 th
{
color: rgba(64, 144, 169, 0.78);
font-size: 14px;
}
#select15 td
{
color: white;
background-color:rgba(18, 19, 18, 0.17) ;

}#select151 td
{
color: white;
background-color:rgba(18, 19, 18, 0.17) ;
}

.table2 th,#select151
{
font-size: 16px;
font-family: monotype corosive;
background-color: rgba(36, 39, 36, 0.83);
}

.table2 th,#select15
{
font-size: 16px;
font-family: monotype corosive;
background-color: rgba(36, 39, 36, 0.83);
}
table
{
border: 2px solid grey;
}
</style>
<div class="container-fluid" >           
<div class="table2">
<table class="imagetable" cellspacing="2" cellpadding="1" style="margin-top:400px;pointer-events:none" id="select15" >
<tr>
    <th>Name</th><th>Club_Id</th><th>Rating</th><th>Player_Id</th><th>Price</th>
</tr>
</table>

</div>   
<div class="table2" style="margin-left:40px; ">
<p id='tbl'></p>
<table class="imagetable" cellspacing="2" cellpadding="1" style="margin-top:-1100px;" id="select151">
<tr>
    <th>Name</th><th>Club_Id</th><th>Rating</th><th>Player_Id</th><th>Price</th>
</tr>
</table>   


</body>




</body>
</html>
