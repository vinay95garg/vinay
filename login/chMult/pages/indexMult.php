  <?php

session_start();
include "../classes/user.php";
$user=new user();
if($_SESSION['GameId']!=0){
    $user->DeleteGame($_SESSION['GameId']);
    $_SESSION['GameId']="";
}



?>
<META HTTP_EQUIV=Refresh;>
<head>
    <link rel="stylesheet" href="../style/style.css">
    
        <script src="../js/jquery.js"></script>
        <script src="../js/ap.js"></script>

        <script src="../js/chatbox.js"></script>
    <title>Chat session</title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/sb-admin.css" rel="stylesheet">
    <link href="../../css/plugins/morris.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../style.css"/>
    
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/plugins/morris/raphael.min.js"></script>
    <script src="../../js/plugins/morris/morris.min.js"></script>
    <script src="../../js/plugins/morris/morris-data.js"></script>


<script type="text/javascript" src="final_selection.js"></script>

    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.5/material.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    


    <style type="text/css">


#AvailablePlayers
{
padding-left: 100px;
}

#ChatMessages{
    top: 90px;
    color:#3666A5;
 
    padding-left: 600px;
}
#chatBig
{
    
    top: 430px;
    padding-left: 600px;

}
    </style>
</head> 


<body >

    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
<!--Header-->
          
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only"></span>
                    
                </button>
                <a class="navbar-brand" href="index.html">Welcome</a>
            </div>
            
                

<!---Username-->




              <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
        ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=""><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href=""><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
<!---Menus Sidebar-->


            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        
                    <a href="../../../minor2\FFL\index.html" ><span class="fa fa-home fa-2">Home</a>
                    </li>
                    <li class="">
                        <a href="../../index.html"> <span class="fa fa-briefcase fa-2">Pick A Team</a>
                    </li>
                    <li class="">
                        <a href="../../playing_game.html"><span class="fa fa-futbol-o fa-2">Playing Game</a>
                    </li>
                    <li>
                        <a href="../../Match_day.html"><span class="fa fa-clock-o fa-2">Match Day</a>
                    </li>
                    <li>
                        <a href="../../News.html"><span class="fa fa-film fa-2">News & Features</a>
                    </li>
                    
                    <li class="active"><a type="submit" id="multiplayer_submit" onclick="parent.location='chMult/pages/UserLogin.php'" value="Multiplayer game">Multiplayer</a></li>

                </ul>
           </nav>






    <h3 style="color:#B7641B;padding-left:60px;padding-top:40px;">Welcome</h3>


    <span style="color:#B7641B;padding-left:90px;font-size: 150%;padding-top:40px;">
        <?php
        //echo "heklo";
            echo $_SESSION['UserName'];
        ?></span>


        <div id="AvailablePlayers">
        </div>

        <div id="ChatMessages">
        </div>

        <div id="chatBig">
            <textarea id="ChatText" name="ChatText"></textarea>
        </div>


    </body>
    </html>

               
    
