<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->
</head>
<?php

require_once('config.php');


 $nopp=$_POST['no_pp'];
 $nama_project=$_POST['nama_project'];
 $jenis_project=$_POST['jenis_project'];
 $jmrow=$_POST['jumlahrow'];
 $url="menu_process_pp.php";

$simpan_modulpp= "INSERT INTO modul_pp (no_pp, nama_modulpp, jenis, softhard) VALUES";

for ($z=1;$z<=$jmrow;$z++){
    

    $modpp 	=$_POST['modulpp'.$z];
 
	if($modpp !=''){
      $simpan_modulpp .=    " ('$nopp','$modpp','$jenis_project','$nama_project' ) ,";
    }			
                   
}

echo "<input type=hidden value='$url' id=url>";
 $insert_simpan      = substr($simpan_modulpp, 0, strlen($simpan_modulpp) - 1).";";
 $cekinsert_simpan   = mysqli_query($koneksi,$insert_simpan);
 if($cekinsert_simpan){?>
    <head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->

</head>
<body>
			<script type=text/javascript>
				swal({ 
						title: "Succes!",
						text: "modul PP nomor : <?php echo $nopp;?> ",
						type: "success" 
					},
					function(){
								window.location.href = 'menu_process_pp.php';
							});
			</script>
</body>
	
 <?php } else {?>
   <head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->

</head>
<body>
           <script type="text/javascript" language="Javascript">
			
				swal({ 
						title: "Error",
						text: "Modul Gagal Ditambah",
						type: "error" 
					},
					function(){
								window.location.href = 'menu_process_pp.php';
							});
			
		</script>
		</body>
	
 <?php }


?>

