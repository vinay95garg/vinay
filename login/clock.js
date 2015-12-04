var json2=new Array();
$(document).ready(function()
{
      $.ajax({
            type: "GET",
            url: "/login/slim_eg/start.php/schedule",
            success: 
                function(data) {
//console.log(data);
//var json2=JSON.parse(data);
                 // var playername;
                  //var imgplayers;
                 //console.log(data);
                   json2=JSON.parse(data);
                   console.log(json2["match_id"]);
                  /* for(var i=0;i<json2.length;i++){

                    console.log(json2[i]);
                    console.log("hello");
                   }*/
                     // console.log(json2[0]);
                        var id1=document.getElementById("club1");
                        var id2=document.getElementById("club2");
                        var id3=document.getElementById("schedule");


                        id1.innerHTML=json2["club_name1"][0];
                        id2.innerHTML=json2["club_name2"][0];
                        id3.innerHTML=json2["date"][0];
                        for(var i=1;i<=5;i++){
                        var id1=document.getElementById(i+"club1");
                        var id2=document.getElementById(i+"club2");
                        var id3=document.getElementById(i+"schedule");


                        id1.innerHTML=json2["club_name1"][i];
                        id2.innerHTML=json2["club_name2"][i];
                        id3.innerHTML=json2["date"][i];

                      }
                    
                    }
            });

  });


      
//console.log(json2["club_name1"][1]);
/*console.log(json2["club_name2"][7]);

var id1=document.getElementById("club1");
var id2=document.getElementById("club2");
var id3=document.getElementById("schedule");

console.log(json2["date"].length);

for(i=0;i<json2["date"].length;i++)
{

    if(i==0)
    {
var id1=document.getElementById("club1");
var id2=document.getElementById("club2");
var id3=document.getElementById("schedule");


                 id1.innerHTML=json2["club_name1"][0];
                 id2.innerHTML=json2["club_name2"][0];
                     id3.innerHTML=json2["date"][0];

}
//$("#club1").innerhtml=["club_name1"][0];
    if(i==7)
    {
var id1=document.getElementById("1club1");
var id2=document.getElementById("1club2");
var id3=document.getElementById("1schedule");


                 id1.innerHTML=json2["club_name1"][7];
                 id2.innerHTML=json2["club_name2"][7];
                     id3.innerHTML=json2["date"][7];

}
    if(i==2)
    {
var id1=document.getElementById("2club1");
var id2=document.getElementById("2club2");
var id3=document.getElementById("2schedule");


                 id1.innerHTML=json2["club_name1"][8];
                 id2.innerHTML=json2["club_name2"][8];
                     id3.innerHTML=json2["date"][8];

}
    if(i==3)
    {
var id1=document.getElementById("3club1");
var id2=document.getElementById("3club2");
var id3=document.getElementById("3schedule");


                 id1.innerHTML=json2["club_name1"][9];
                 id2.innerHTML=json2["club_name2"][9];
                     id3.innerHTML=json2["date"][9];

}
    if(i==4)
    {
var id1=document.getElementById("4club1");
var id2=document.getElementById("4club2");
var id3=document.getElementById("4schedule");


                 id1.innerHTML=json2["club_name1"][10];
                 id2.innerHTML=json2["club_name2"][10];
                     id3.innerHTML=json2["date"][10];

}

    if(i==5)
    {
var id1=document.getElementById("5club1");
var id2=document.getElementById("5club2");
var id3=document.getElementById("5schedule");


                 id1.innerHTML=json2["club_name1"][11];
                 id2.innerHTML=json2["club_name2"][11];
                     id3.innerHTML=json2["date"][11];

}*/
