<?php

/*
Author : Abd Rahmat Ika
Blog : http://abdrahmatika.com
*/

$NamaBulan = Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", 
					"Agustus", "September", "Oktober", "November", "Desember");

// kode2
if (!isset($_REQUEST["bulan"])) $_REQUEST["bulan"] = date("m");
if (!isset($_REQUEST["tahun"])) $_REQUEST["tahun"] = date("Y");


$cBulan = $_REQUEST["bulan"];
$cTahun = $_REQUEST["tahun"];
 
$prev_tahun = $cTahun;
$next_tahun = $cTahun;
$prev_bulan = $cBulan-1;
$next_bulan = $cBulan+1;
 

if ($next_bulan == 13 ) {
    $next_bulan = 1;
    $next_tahun = $cTahun + 1;
}
if ($prev_bulan == 0 ) {
    $prev_bulan = 12;
    $prev_tahun = $cTahun - 1;
}

?>

<div style="padding:10px;border:1px solid #eee;background:purple;width:200px">
	<table width="200">
	<tr align="center">
		<td style="color:#FFFFFF">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="50%" align="left">  <a href="<?php echo $_SERVER["PHP_SELF"] . "?bulan=". $prev_bulan . "&tahun=" . $prev_tahun; ?>" style="color:#FFFFFF">Sebelumnya</a></td>
				<td width="50%" align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?bulan=". $next_bulan . "&tahun=" . $next_tahun; ?>" style="color:#FFFFFF">Selanjutnya</a>  </td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<table width="100%" bgcolor="#000" style="color:#fff" border="0" cellpadding="2" cellspacing="2">
				<tr align="center">
					<td colspan="7" bgcolor="#999999" style="color:#FFFFFF"><strong><?php echo $NamaBulan[$cBulan-1].' '.$cTahun; ?></strong></td>
				</tr>
				<tr>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>S</strong></td>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>M</strong></td>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>T</strong></td>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>W</strong></td>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>T</strong></td>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>F</strong></td>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>S</strong></td>
				</tr>

				<?php 
					$timestamp = mktime(0,0,0,$cBulan,1,$cTahun);
					$maxday = date("t",$timestamp);
					$thismonth = getdate ($timestamp);
					$startday = $thismonth['wday'];

					for ($i=0; $i<($maxday+$startday); $i++) {
					    if(($i % 7) == 0 ) echo "<tr>";
					    if($i < $startday) echo "<td></td>";
					    else echo "<td align='center' valign='middle' height='20px'>". ($i - $startday + 1) . "</td>";
					    if(($i % 7) == 6 ) echo "</tr>";
					}
				?>
			</table>
		</td>
	</tr>
	</table>
</div>