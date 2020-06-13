<!doctype html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta id="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">

	<link rel="stylesheet" href="assets/css/bootstrap.css"> 
<title>Covid</title> 
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
.link-button{
		text-decoration: none;
		background-color: #4CAF50;
		color: black;
		padding: 2px 6px 2px 6px;
		border: 1px solid #c2c2c2;
		border-radius:2px;
	    display: inline-block;
        font-size: 16px;
		cursor: pointer;
	}
.button {
      background-color: #4CAF50;
      color: white;
      text-align: center;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
}

.scroll{
display:table;
border: 0px solid red;
width: 100%;
height: 1400px;
overflow:scroll;
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

.table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
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

      <div class="scroll">
      <?php
	require_once('dbConfig.php');
	$upload_dir = 'uploads/';
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];

		$sql = "select photo from tabel where id = ".$id;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$photo = $row['photo'];
			unlink($upload_dir.$photo);
			$sql = "delete from tabel where id=".$id;
			if(mysqli_query($conn, $sql)){
				header('location:index.php');
			}
		}
	}
?>


<center>
 <h1>Data Positive Covid</h1>
 <a href="add.php" class="link-button"><span style="color:#FFFFFF"> Tambah Data</span></a>
 <br><br>
 <table>
  <tr>
   <th>No</th>
   <th>NIM</th>
   <th>Nama</th>
   <th>Alamat</th>
   <th>jenis kelamin</th>
   <th>photo</th>
   <th>Opsi</th>
  </tr>
  <?php
  $sql = "SELECT * FROM tabel";
  $query = mysqli_query($conn, $sql);
    foreach($query as $row){
  ?>
   <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['nim'] ?></td>
    <td><?php echo $row['nama'] ?></td>
    <td><?php echo $row['alamat'] ?></td>
    <td><?php echo $row['jk'] ?></td>
	<td><img src="<?php echo $upload_dir.$row['photo'] ?>" height="100"></td>
    <td><a href='delete.php?id=<?php echo $row['id']; ?>'>Hapus</a></td>
   </tr>
  <?php
  }
  ?>
 </table>


<script src="assets/js/jquery.js"></script> 
<script src="assets/js/popper.js"></script> 
<script src="assets/js/bootstrap.js"></script>
</body> 
</html>

