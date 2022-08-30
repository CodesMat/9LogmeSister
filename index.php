<?php include_once 'header.php' ; ?>
<div class="container">
<div style="border:3px solid black;" class="row">
<form method="GET" id="pridatZaznam">
  <h4>Text</h4> <div class="col-md-4"> <textarea name="textTyp"></textarea></div>
	<h4>Typ Záznamu</h4> <div class="col-md-4"><select name="typZaznamu" id="volba">
  <option value="informace">informace</option>
  <option value="upozorneni">Upozornění</option>
  <option value="chyba">Chyba</option>
  <option value="kritickaChyba">Kritická chyba</option>
</select>
</div>
	<div class="col-md-12"><input type="submit" name="vyhodnot"></div>
</form>
</div>
</div>
<?php

if (isset($_GET['vyhodnot'])) {
	$text = $_GET['textTyp'];
	$typZaznamu = $_GET['typZaznamu'];
	$sql = "INSERT INTO `zaznamy`(`textTyp`, `typ`) VALUES ('$text','$typZaznamu');";
	if ($conn->query($sql) === TRUE) {
		echo "dobra prace";
header("Location: ./index.php");
	}else{
		echo "problemo";
	}
}



  ?>
<?php include_once 'footer.php';  ?>

<script type="text/javascript">
		$(document).ready(function(){
$("#pridatZaznam").validate({
	rules:{
		
		textTyp: {
			 maxlength: 255,
			required:true,
		},
		
		
		
		
		
		
		
		
		
	}
});
		});
	</script>