 

<?php
function vr_extenso($moeda=0) {
$moeda = str_replace(".", "", $moeda);
$moeda = str_replace(",", ".", $moeda);
$singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
$plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões");
$c = array("", "cem", "duzentos", "trezentos", "quatrocentos",
"quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
$d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta",
"sessenta", "setenta", "oitenta", "noventa");
$d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze",
"dezesseis", "dezesete", "dezoito", "dezenove");
$u = array("", "um", "dois", "três", "quatro", "cinco", "seis",
"sete", "oito", "nove");
$z=0;
$moeda = number_format($moeda, 2, ".", ".");
$total = explode(".", $moeda);
for($i=0;$i<count($total);$i++)
for($ii=strlen($total[$i]);$ii<3;$ii++)
$total[$i] = "0".$total[$i];
$fim = count($total) - ($total[count($total)-1] > 0 ? 1 : 2);
for ($i=0;$i<count($total);$i++) {
$moeda = $total[$i];
$rc = (($moeda > 100) && ($moeda < 200)) ? "cento" : $c[$moeda[0]];
$rd = ($moeda[1] < 2) ? "" : $d[$moeda[1]];
$ru = ($moeda > 0) ? (($moeda[1] == 1) ? $d10[$moeda[2]] : $u[$moeda[2]]) : "";
$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
$ru) ? " e " : "").$ru;
$t = count($total)-1-$i;
$r .= $r ? " ".($moeda > 1 ? $plural[$t] : $singular[$t]) : "";
if ($moeda == "000")$z++; elseif ($z > 0) $z--;
if (($t==1) && ($z>0) && ($total[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
($total[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
}
print($rt  );
}
?>
 

<?php


echo '<form  name="form1"  method="post" action="Cheque_ por_ Extenso.php">
<input id="t1" name="ts" type="text" value="" />
<input id="b1" name="b1" type="submit" value="Clique aqui!" />
</form>';
 
$T =  $_POST['ts'] ; 
print $T; "n/". "<BR>" ;
vr_extenso ("$T");
 	 
 

 

?>
  
 
