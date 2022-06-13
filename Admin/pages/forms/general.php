<?php
session_start();
include("conn.php");
if(strlen($_SESSION['alogin'])==0)
  { 
header('location: https://localhost/6days.com/index.php', true, 301);
}
//add categories
if(isset($_POST['#catsubmit']))
{
  $categ= $_POST['acat'];
  $result= "INSERT INTO categories(cname) VALUES ('$categ')";
  $result->execute();
  echo '$result2';
  if(mysqli_query($conn,$result)){
    echo '<script>alert("record inserted Successfully")</script>';
  }else  {
    echo '<script>alert("failed")</script>';
  }

}
//ctegory show
$query= "SELECT * FROM categories";
$result1=mysqli_query($conn, $query); 


//book upload
if(isset($_POST['booksubmit']))
{
  //pdf
  $allow=array('pdf');
  $temp=explode(".", $_FILES['bookpdf']['name']);
  $extension=end($temp);
  $upload_file=$_FILES['bookpdf']['name'];
  move_uploaded_file($_FILES['bookpdf']['tmp_name'], "pdf/".$_FILES['bookpdf']['name']);
  //book discription
  $bookd=$_POST['bookdis'];
  //book category
  $bcat=$_POST['category'];
  $bookn=$_POST['bookname'];
  $bookau=$_POST['bookauthor'];
  $bookp=$_POST['bookpublisher'];
  $bookl=$_POST['booklang'];
  $file = addslashes(file_get_contents($_FILES["inputimg"]["tmp_name"]));
  $query1= "INSERT INTO book(bname, bauthorname, bpublisher, cid, blang, bimage, bookdescription, bookpdf) VALUES ('$bookn', '$bookau', '$bookp', '$bcat', '$bookl', '$file', '$bookd', '".$upload_file."')";
  if(mysqli_query($conn,$query1)){
    echo '<script>alert("record inserted Successfully")</script>';
  }else  {
    echo '<script>alert("failed")</script>';
  }
  
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Input Panal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://localhost/6days.com/Admin" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://localhost/6days.com/Admin/general.php" class="nav-link">Add Records</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Input Panal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) 
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="https://localhost/6days.com/Admin" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

            <li class="nav-item">
                <a href="https://localhost/6days.com/Admin/user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users Data</p>
                </a>
              </li>
      
              <li class="nav-item">
                <a href="general.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Records</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="https://localhost/6days.com/Admin/index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update</p>
                </a>
              </li>
                 </li>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Records</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="https://localhost/6days.com/Admin/index.php">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body" >
                  <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <input type="text" name="bookname" class="form-control" id="bookname" placeholder="Enter Book Name">
                  </div>
                  <div class="form-group">
                    <label for="bookauthor">Book Author</label>
                    <input type="text" name="bookauthor" class="form-control" id="bookauthor" placeholder="Enter Book Author Name">
                  </div>
                  <div class="form-group">
                    <label for="bookpublisher">Book Publisher</label>
                    <input type="text" name="bookpublisher" class="form-control" id="bookpublisher" placeholder="Enter Book Publisher Name">
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                          <?php while($row1 = mysqli_fetch_array($result1)):;?>
                          <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                          <?php endwhile;?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Language</label>
                        <select class="form-control" name="booklang">
                          <option>English</option>
                          <option>Marathi</option>
                          <option>Hindi</option>
                          <option>Gujrati</option>
                          <option>Tamil</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputimg">To Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="inputimg" class="custom-file-input" id="inputimg">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputbook">To Upload Book file</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputbook" accept="application/pdf" name="bookpdf">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="bookdis" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="insert" name="booksubmit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add Categories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="post">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="acat">To Add Category</label>
                        <input type="text" name="acat" class="form-control" id="acat" placeholder="Enter Category Name">
                      </div>
                   
                <div class="card-footer">
                  <button type="submit" name="catsubmit" id="catsubmit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.3-pre
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#bookimg').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#bookimg').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#bookimg').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
</body>
</html>