<?php
require_once('koneksi.php');
if($_POST){

	$sql = "UPDATE cloud SET Nama='".$_POST['Nama']."', NIM='".$_POST['NIM']."' WHERE id=".$_POST['id'];

	if ($koneksi->query($sql) === TRUE) {
	    echo "<script>
	alert('Data berhasil di update');
	window.location.href='index.php?page=crud/index';
	</script>";
	} else {
	    echo "Gagal: " . $koneksi->error;
	}

	$koneksi->close();
	
}else{
	$query = $koneksi->query("SELECT * FROM cloud WHERE id=".$_GET['id']);

	if($query->num_rows > 0){
		$data = mysqli_fetch_object($query);
	}else{
		echo "data tidak tersedia";
		die();
	}
?>
<div class="row">
	<div class="col-lg-6">
		<form action="" method="POST">
			<input type="hidden" name="id" value="<?= $data->id ?>">
			<div class="form-group">
				<label>Nama</label>
				<input type="text" value="<?= $data->Nama ?>" class="form-control" name="Nama">
			</div>
			<div class="form-group">
				<label>NIM/label>
				<input type="text" value="<?= $data->NIM ?>" class="form-control" name="NIM">
			</div>
			<input type="submit" class="btn btn-primary btn-sm" name="Update" value="Update">
		</form>
	</div>
</div>
<?php
}
mysqli_close($koneksi);
?>