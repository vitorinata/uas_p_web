<!doctype html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta id="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">

	<link rel="stylesheet" href="assets/css/bootstrap.css"> 
<title>PHOTODIARY</title> 
	<style>
div.gallery {
    border: 1px solid #ccc;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

.ll {
	  padding-left:22%;
	  margin-bottom:10px;
	  }
	  
.tombol {
  font-family: "._PlayfairDisplay-Regular.ttf";
  color: #626262;
  font-size: 13pt;
  margin-bottom: -1.5rem;
  margin-left: -1rem;
  margin-right: -1rem;
  padding: 15px 32px;
  text-align: center;
  margin: 4px 2px;
  background-color: white;
  border: 1px solid black;
}

input:invalid {
    background-color: #ececf6;
}

button{
    background-color: #ececf6;
}

div.desc {
    padding: 15px;
    text-align: center;
}

div.comment {
  width: 80%;
  margin-right: auto;
  margin-left: auto;
}

div.textil{
  margin-right: -2.5rem;
}

* {
    box-sizing: border-box;
}

.reponsive {
    padding: 0 6px;
    float: left;
    width: 100%;
}

.responsive {
    padding: 0 6px;
    float: none;
    width: 80%;
}

@media only screen and (max-width: 700px){
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px){
    .responsive {
        width: 100%;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
.rekponsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}
</style>
</head> 
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="container">
    <a class="navbar-brand" href="#">COvid19</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ml-auto">
	    <li class="nav-item">
          <a class="nav-link" href="../index.php">Log Out</a>
        </li>
      </ul>

    </div>
  </div>

</nav>

		
<?php			
require_once('dbConfig.php');
	$upload_dir = 'uploads/';

	if(isset($_POST['btnSave'])){
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];

		$imgName = $_FILES['myfile']['name'];
		$imgTmp = $_FILES['myfile']['tmp_name'];
		$imgSize = $_FILES['myfile']['size'];

		if(empty($nik)){
			$errorMsg = 'Please input name';
			}elseif(empty($nama)){
			$errorMsg = 'Please input alamat';
			}elseif(empty($alamat)){
			$errorMsg = 'Please input jk';
		}elseif(empty($jk)){
			$errorMsg = 'Please input tarif';
		}elseif(empty($imgName)){
			$errorMsg = 'Please select photo';
		}else{
			
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
			
			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
			
			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
			
			if(in_array($imgExt, $allowExt)){
				
				if($imgSize < 5000000){
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}

		if(!isset($errorMsg)){
			$sql = "insert into tabel(nik,nama,alamat, jk, photo)
					values('".$nik."', '".$nama."','".$alamat."','".$jk."','".$userPic."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'Data berhasil ditambahkan';
				header('refresh:5;index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}

	}
?>



			<center><h3>Daftar</h3>
			<br><br>

	<?php
		if(isset($errorMsg)){		
	?>
		<div>
		<strong><?php echo $errorMsg; ?></strong>
		</div>
	<?php
		}
	?>

	<?php
		if(isset($successMsg)){		
	?>
		<div>
		<strong><?php echo $successMsg; ?> - Tunggu sebentar</strong>
		</div>
	<?php
		}
	?>
	<form action="" method="post" enctype="multipart/form-data">
		<div>
		<label for="nik">Nik</label>
		<input style="height:40px; width:300px;" type="text" name="nik" class="form-control">
		</div>
		<div >
		<label for="nama">nama</label>
		<input style="height:40px; width:400px;" type="text" name="nama" class="form-control">	
		</div>
		<div >
		<label for="alamat">alamat</label>
		<input style="height:40px; width:500px;" type="text" name="alamat" class="form-control">	
		</div>
		<div >
			<label for="jk">jk</label><br>
			  <label>
			  <select name="jk">
                <option>laki-laki</option>
                <option>wanita</option>
              </select>
			  </label>  
		  </div><br>
		<div>
			<label for="photo" class="col-md-2">Photo</label>
			  <input type="file" name="myfile">
		</div><br>
		<div>
			<label></label>
			<button type="submit" class="btn btn-success" name="btnSave">Save</button>
			</div>
		
	</form>




<script src="assets/js/jquery.js"></script> 
<script src="assets/js/popper.js"></script> 
<script src="assets/js/bootstrap.js"></script>
</body> 
</html>