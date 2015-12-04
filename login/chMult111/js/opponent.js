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
var count=0;
var count2=0;
var user=0;
var opp=0;


$(document).ready(function()
 {
  


    $.ajax({
           type: "GET",
            url: "/login/slim_files/start.php",
             success: 
                function(data) {
                    //console.log(data);
                    var arr3=JSON.parse(data);

                     console.log(arr3);
                     var len=arr3["players_name"].length;
                     console.log(len);

for(k=0;k<len;k++)
{
                     var id=document.getElementById("select151");
                        var row=id.insertRow(k+1);
                        count1++;
                        gk1[count1]=row;
                        gk2[count1]=row;
                      //  console.log(gk1[1]);     


                        var cell11=row.insertCell(0);
                        cell11.innerHTML=arr3["players_name"][k];
                        var cell21=row.insertCell(1);
                           cell21.innerHTML=arr3["club_id"][k];
                    
                        var cell31=row.insertCell(2);
                        cell31.innerHTML=arr3["rating"][k];
                        
                      //  console.log(select_team1[k]);

                        var cell41=row.insertCell(3);
                        cell41.innerHTML=arr3["player_cost"][k];
                        var cell51=row.insertCell(4);
                        cell51.innerHTML=arr3["player_id"][k];
                        select_team1[k]=arr3["player_cost"][k];
                        
                         }




}





});       

});