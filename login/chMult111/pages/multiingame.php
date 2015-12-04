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
                     var id=document.getElementById("select151");
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


</script>













<style type="text/css">

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



#select151 tr:hover td
{
background-color:grey;
}

#select151 td
{
height: 20px;
width: 70px;
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


#select151 th
{
color: rgba(64, 144, 169, 0.78);
font-size: 14px;
}

#select151 td
{
color: white;
background-color:rgba(18, 19, 18, 0.17) ;



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
<table class="imagetable" cellspacing="2" cellpadding="1" style="margin-top:400px;" id="select151" >
<tr>
    <th>Name</th><th>Club_Id</th><th>Rating</th><th>Player_Id</th><th>Price</th>
</tr>
</table>

</div>   


</body>




</body>
</html>