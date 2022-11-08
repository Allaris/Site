<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restauracja</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body >
    <div id="baner"> 
        <h1>Restauracja Rodzinna</h1>  
    </div>
    
    
    <div id="lewypanel">  
        <form onchange='fun()'>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "restauracja");

                for ($i=1;$i<=4;$i++){
                    $query = "SELECT `nazwa`,`cena`,`typ` FROM `dania` WHERE `typ`='$i'";

                    $result = mysqli_query($conn,$query);

                    if($i==1){
                        $d="Zupy: "."<br>";
                    }
                    else if($i==2){
                        $d="Dania główne: "."<br>";
                    }
                    else if($i==3){
                        $d="Przystawki: "."<br>";
                    }
                    else if($i==4){
                        $d="Napoje: "."<br>";
                    }



                    echo "<br>"."<h2>".$d."</h2>"."<br>";
                     while($row=mysqli_fetch_row($result)){
                    echo $row[0]." (".$row[1]." zł".")"."<input type=checkbox class=checkbox value=".$row[1].">"."<br>";
                    }

                }

                // $query1 = "SELECT `nazwa`,`cena`,`typ` FROM `dania` WHERE `typ`=1";
                // $query2 = "SELECT `nazwa`,`cena`,`typ` FROM `dania` WHERE `typ`=2";
                // $query3 = "SELECT `nazwa`,`cena`,`typ` FROM `dania` WHERE `typ`=3";
                // $query4= "SELECT `nazwa`,`cena`,`typ` FROM `dania` WHERE `typ`=4";

                // $result1 = mysqli_query($conn,$query1);
                // $result2 = mysqli_query($conn,$query2);
                // $result3 = mysqli_query($conn,$query3);
                // $result4 = mysqli_query($conn,$query4);

                // echo "<h2>"."Zupy:"."</h2>"."<br>";
                // while($row1=mysqli_fetch_row($result1)){
                //     echo $row1[0]."(".$row1[1]." zł".")"."<input type=checkbox value=".$row1[1].">"."<br>";
                // }
                // echo "<br>"."<h2>"."Dania główne:"."</h2>"."<br>";
                // while($row2=mysqli_fetch_row($result2)){
                //     echo $row2[0]."(".$row2[1]." zł".")"."<input type=checkbox value=".$row1[1].">"."<br>";
                // }
                // echo "<br>"."<h2>"."Przystawki:"."</h2>"."<br>";
                // while($row3=mysqli_fetch_row($result3)){
                //     echo $row3[0]."(".$row3[1]." zł".")"."<input type=checkbox value=".$row1[1].">"."<br>";
                // }
                // echo "<br>"."<h2>"."Napoje:"."</h2>"."<br>";
                // while($row4=mysqli_fetch_row($result4)){
                //     echo $row4[0]."(".$row4[1]." zł".")"."<input type=checkbox value=".$row1[1].">"."<br>";
                // }



                mysqli_close($conn);
            
            ?>
            
        </form>
    </div>
    
    
    <div id="prawypanel">   
        <img src="obrazek.png" alt="potrawa">
        <h3>Wartość zamówienia</h3>
        <p id="p2">  </p>
    </div>
        <script>
                let suma=0;
                let box = document.getElementsByTagName("input");

            function fun(){
                

                for(let i=0; i<=box.length ;i++){
                    if(box[i].type === 'checkbox' && box[i].checked){
                        suma+=parseInt(box[i].value);
                    }
                }
                document.getElementById("p2").innerHTML=suma+" zł";
            
            }
        



        </script>
        
    
    <div id="stopka">   
        <p>Opracował: Damian Butowski ©</p>
    </div>

    


</body>
</html>