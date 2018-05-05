<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>다솜::주점 계좌알려주기용</title>
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
   <script type="text/javascript">
     function copy_to_clipboard() {
      var copyText = document.getElementById("myInput");
      copyText.select();
      document.execCommand("Copy");
      alert('클립보드에 계좌번호 복사되었습니다.')
    }
    function copy_to_clipboard2() {
      var copyText = document.getElementById("myInput2");
      copyText.select();
      document.execCommand("Copy");
      alert('클립보드에 전화번호 복사되었습니다.')
    }
    function move(){
      alert("감사합니다. \n입금 확인 후 바로 준비해서 드리겠습니다 !");
      location.href = "./index.php";
    }
    </script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">입금정보</a>
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
          <i class="fa fa-heart"></i> 현금</div>
         <div class="card-body">
          <p>print ( " 사랑합니다. " );</p>
         </div>
      </div>
     
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-credit-card"></i> 계좌이체</div>
        <div class="card-body">
            <label for="exampleInputName">우리은행</label>
            <br>
            <input class="form-control" id="myInput" type="text" aria-describedby="nameHelp" value="1002653931416" name="tableno" style='width:70%;display: inline;border-color: red;' readonly="true">
            <input type="button" class="btn btn-danger form-control btn-sm"  aria-describedby="nameHelp" value="복사" style='width:25%;display: inline;' onClick="copy_to_clipboard();">
        </div>
      </div>

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-credit-card"></i> 토스!</div>
        <div class="card-body">
            <label for="myInput2">박형준</label>
            <br>
            <input class="form-control" id="myInput2" type="text" aria-describedby="nameHelp" value="01041398117" name="tableno" style='width:70%;display: inline;border-color: red;' readonly="true">
            <input type="button" class="btn btn-danger form-control btn-sm"  aria-describedby="nameHelp" value="복사" style='width:25%;display: inline;' onClick="copy_to_clipboard2();">
        </div>
      </div>
      <button type='button' class="btn btn-primary btn-block" onclick='move()'>입금 했어요 !!</button>
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
   
  </div>
</body>

</html>
