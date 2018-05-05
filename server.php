<?php
require_once("DB/dbconfig.php"); 
$sql = "SELECT * FROM sool_server";
$sql2 = 'SELECT max(tableId) FROM sool_server;';

$query = mysqli_query($db,$sql);
$query2 = mysqli_query($db,$sql2);
$lastIdx = mysqli_fetch_array($query2)['max(tableId)'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>다솜::주점 웨이터용</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="https://cdn.rawgit.com/singihae/Webfonts/master/style.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
  @import url('//fonts.googleapis.com/earlyaccess/hanna.css');
  body{
   font-family: 'Hanna', fantasy;
  }
  #dataTable_length{
    text-align: left;
  }
   #dataTable_filter{
    visibility: hidden;
  }
  </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Server 용</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <!--
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">키발급</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
      </ol>
    -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> 키발급</div>
         <div class="card-body">
        <form method='post' action='DB/createid.php'>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <label for="exampleInputName">테이블 번호</label>
                <input class="form-control" id="exampleInputName" type="number" aria-describedby="nameHelp" placeholder="Enter Table No" name="tableno">
              </div>
              <div class="col-md-5">
                <label for="exampleInputLastName">테이블 ID</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Press Button" name="tableid">
              </div>
              <div class="col-md-1">
                <label for="exampleInputLastName"> ID Create</label>
                <input type="button" id = 'exampleInputLastName' class="btn btn-danger btn-block form-control"  aria-describedby="nameHelp" value="Create" onclick='createkey()'>
              </div>
            </div>
          </div>
          <button type='submit' class="btn btn-primary btn-block">Register</button>
        </form>
      </div>
      </div>
      
      <!-- Example DataTables Card-->

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Table 정보</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Table</th>
                  <th>Id</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Table</th>
                  <th>Id</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                while ( $row=mysqli_fetch_array($query))
                {
                  echo'
                  <tr>
                  <td>'.$row['tableNo'].' 번</td>
                  <td>'.$row['tableId'].'</td>
                  </tr>
                  ';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © DASOM & DevHyung 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script type="text/javascript">
      function createkey(){
        document.getElementById('exampleInputLastName').value= <?=$lastIdx+1?>;
      }
      function select(){
        var sel = document.getElementById("selecttype");
        var val = sel.options[sel.selectedIndex].text;
        document.getElementById("selecttype").value = val;
      }
      function del(key) {
        window.open("../DB/del.php?key="+key, "_blank", "left=300,width=10,height=10");
        confirm("삭제되었습니다.");
        location.reload();
      }
      function bancancle(key){
       window.open("../DB/ban.php?key="+key, "_blank", "left=300,width=10,height=10");
        confirm("해제되었습니다.");
        location.reload(); 
        
      }
    </script>
  </div>
</body>

</html>
