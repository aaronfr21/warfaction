<?php
require_once('koneksi.php');
if($_POST){
	try {
		$sql = "INSERT INTO cloud (Nama,NIM) VALUES ('".$_POST['Nama']."','".$_POST['NIM']."')";
		if(!$koneksi->query($sql)){
			echo $koneksi->error;
			die();
		}

	} catch (Exception $e) {
		echo $e;
		die();
	}
	  echo "<script>
	alert('Data berhasil di simpan');
	window.location.href='index.php?page=crud/index';
	</script>";
}
?>
<div class="row">
	<div class="col-lg-6">
		<form action="" method="POST">
			<div class="form-group">
				<label>Nama</label>
				<input type="text" value="" class="form-control" name="Nama">
			</div>
			<div class="form-group">
				<label>NIM</label>
				<input type="text" value="" class="form-control" name="NIM">
			</div>
			<input type="submit" class="btn btn-primary btn-sm" name="create" value="Create">
		</form>
	</div>
</div>