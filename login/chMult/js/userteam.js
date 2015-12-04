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
                        gk2[count]=row;

                        var cell1=row.insertCell(0);
                        cell1.innerHTML=arr["players_name"][k];
                                               // console.log("hello");
                        var cell2=row.insertCell(1);
                           cell2.innerHTML=arr["club_id"][k];
                    
                        var cell3=row.insertCell(2);
                        cell3.innerHTML=arr["rating"][k];
                         select_team[k]=arr["rating"][k];
                        console.log(select_team[k]);


                        var cell4=row.insertCell(3);
                        cell4.innerHTML=arr["player_cost"][k];
                        var cell5=row.insertCell(4);
                        cell5.innerHTML=arr["player_id"][k];

//console.log(gk[1]);


                         }




}





});       

});