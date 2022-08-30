
<?php
include_once 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <select>Seřadit
                <a href="zaznamy.php?karel = 24"><option>Největší</option></a>
                <option>Nejmenší</option>
                <option></option>
                <input type="submit" name="">
            </select>
        </div>
        <div class="col-md-6">
            <?php

for ($days = 0; $days <= 9; $days++){ $karel =( date('Y-m-d',strtotime(date('Y-m-d').' -'.$days.' days'))." ");

?><a href="zaznamy.php?den=<?php echo $karel;?>">
    <span style="width:50px;height: 50px;" ><?php echo $karel;?></span>
    
</a>
<?php 
echo "<br>";
 }

if (isset($_GET['den'])) {
    $den = $_GET['den'];
$sql = "SELECT * FROM zaznamy WHERE DATE(datum_pri) =  '$den' LIMIT 10; ";
$result = mysqli_query($conn,$sql);
?>
<table class="table">
    <tbody>
        <td>Text</td>
        <td>Typ</td>
        <td>datum Přijetí</td>
        <tr>

<?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
            if ($row['typ'] =="kritickaChyba") {
    ?>

                                   <td>
                                        <p style="color: purple;text-decoration: none;" class="col-6 mb-4"><?php echo $row['textTyp'];  ?></p>
                                    </td>
                                    
                                    <td><a style="color:purple;text-decoration: none;" class="col-6 mb-4"><?php echo $row['typ'];?></a>
                                        </a></td>
                                   
                                    <td><a style="color:purple;text-decoration: none;" class="col-6 mb-4"><?php echo $row['datum_pri'];?></a>
                                        </a></td>
       
                                 

                                    
                                </tr>


    <?php
 }


 if ($row['typ'] =="upozorneni") {
    ?>
 <tr>
                                   <td>
                                        <p style="color: yellow;text-decoration: none;" class="col-6 mb-4"><?php echo $row['textTyp'];  ?></p>
                                    </td>
                                    
                                    <td><a style="color:yellow;text-decoration: none;" class="col-6 mb-4"><?php echo $row['typ'];?></a>
                                        </a></td>
                                         <td><a style="color:yellow;text-decoration: none;" class="col-6 mb-4"><?php echo $row['datum_pri'];?></a>
                                        </a></td>
                                   
       
                                 

                                    
                                </tr>

    <?php

 }


            if ($row['typ'] =="informace") {
               ?>
 <tr>
                                   <td>
                                        <p style="color: lightblue;text-decoration: none;" class="col-6 mb-4"><?php echo $row['textTyp'];  ?></p>
                                    </td>
                                    
                                    <td><a style="color:lightblue;text-decoration: none;" class="col-6 mb-4"><?php echo $row['typ'];?></a>
                                        </a></td>

                                         <td><a style="color:lightblue;text-decoration: none;" class="col-6 mb-4"><?php echo $row['datum_pri'];?></a>
                                        </a></td>
                                   
       
                                 

                                    
                                </tr>


               <?php
            }
            if ($row['typ'] =="chyba") {
                ?><tr>
                                   <td>
                                        <p style="color: red;text-decoration: none;" class="col-6 mb-4"><?php echo $row['textTyp'];  ?></p>
                                    </td>
                                    
                                    <td><a style="color:red;text-decoration: none;" class="col-6 mb-4"><?php echo $row['typ'];?></a>
                                        </a></td>
                                        <td><a style="color:red;text-decoration: none;" class="col-6 mb-4"><?php echo $row['datum_pri'];?></a>
                                        </a></td>
                                   
       
                                 

                                    
                                </tr><?php
            }
            ?>



       <?php
            }
        }
        
        ?>
</tbody>
</table>
        <?php




}

  ?></div>

        <div class="col-md-6"><table class="table ">
                            <tbody>
                                   <td width="390">Text</td>
                                    <td>Typ</td>
                                    <td>Datum Přijetí</td>


<?php
  $maxVysledku =16;
$sqlB = "SELECT * FROM zaznamy ;";
$result = mysqli_query($conn,$sqlB);
$pocetVysledku = mysqli_num_rows($result);
$pocetStranek = ceil($pocetVysledku/$maxVysledku);











           

    ?>

                               











        
    <?php

?>
  
 
                    <?php 
if (!isset($_GET['stranka'])) {
$stranka = 1;
}
else{
    $stranka = $_GET['stranka'];
}
//limit pro sqlko

$vysledekNaStrance = ($stranka-1)*$maxVysledku;
$sqlB ="SELECT * FROM zaznamy LIMIT ".$vysledekNaStrance.','.$maxVysledku;
$result = mysqli_query($conn,$sqlB);
if (mysqli_num_rows($result) > 0) {


    while($row = mysqli_fetch_array($result))
          {

 if ($row['typ'] =="kritickaChyba") {
    ?>
<tr>
                                   <td>
                                        <p style="color: purple;text-decoration: none;" class="col-6 mb-4"><?php echo $row['textTyp'];  ?></p>
                                    </td>
                                    
                                    <td><a style="color:purple;text-decoration: none;" class="col-6 mb-4"><?php echo $row['typ'];?></a>
                                        </a></td>
                                   
                                    <td><a style="color:purple;text-decoration: none;" class="col-6 mb-4"><?php echo $row['datum_pri'];?></a>
                                        </a></td>
       
                                 

                                    
                                </tr>


    <?php
 }


 if ($row['typ'] =="informace") {
    ?>
 <tr>
                                   <td>
                                        <p style="color: yellow;text-decoration: none;" class="col-6 mb-4"><?php echo $row['textTyp'];  ?></p>
                                    </td>
                                    
                                    <td><a style="color:yellow;text-decoration: none;" class="col-6 mb-4"><?php echo $row['typ'];?></a>
                                        </a></td>
                                         <td><a style="color:yellow;text-decoration: none;" class="col-6 mb-4"><?php echo $row['datum_pri'];?></a>
                                        </a></td>
                                   
       
                                 

                                    
                                </tr>

    <?php

 }


            if ($row['typ'] =="informace") {
               ?>
 <tr>
                                   <td>
                                        <p style="color: lightblue;text-decoration: none;" class="col-6 mb-4"><?php echo $row['textTyp'];  ?></p>
                                    </td>
                                    
                                    <td><a style="color:lightblue;text-decoration: none;" class="col-6 mb-4"><?php echo $row['typ'];?></a>
                                        </a></td>

                                         <td><a style="color:lightblue;text-decoration: none;" class="col-6 mb-4"><?php echo $row['datum_pri'];?></a>
                                        </a></td>
                                   
       
                                 

                                    
                                </tr>


               <?php
            }
            if ($row['typ'] =="chyba") {
                ?><tr>
                                   <td>
                                        <p style="color: red;text-decoration: none;" class="col-6 mb-4"><?php echo $row['textTyp'];  ?></p>
                                    </td>
                                    
                                    <td><a style="color:red;text-decoration: none;" class="col-6 mb-4"><?php echo $row['typ'];?></a>
                                        </a></td>
                                        <td><a style="color:red;text-decoration: none;" class="col-6 mb-4"><?php echo $row['datum_pri'];?></a>
                                        </a></td>
                                   
       
                                 

                                    
                                </tr><?php
            }




?>

                                <tr>
                                   
                               <?php


          }
      }


?>


 </tr>
                                 
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
  <ul class="pagination">
    
    
   
  
                         <?php
                    for ($i=1; $i <$pocetStranek+1 ; $i++) { 
                        ?>
                     <!-- stranky -->  
                      <li class="page-item"><a class="page-link" href="zaznamy.php?stranka=<?php echo $i; ?>"><?php echo $i ?></a></li>
   
    <?php

?>

    <?php

 ?>
     
 
 <?php
}

 ?>
 </ul>
</nav>
</div>
</div>
</div>





 
                        

                </div>
                    </div>