<?php
require_once("DB/dbconfig.php"); 
//$sql = "SELECT * FROM sool_server";
//$sql2 = 'SELECT max(tableId) FROM sool_server;';
//$query = mysqli_query($db,$sql);
//$query2 = mysqli_query($db,$sql2);
//$lastIdx = mysqli_fetch_array($query2)['max(tableId)'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>다솜::주점 고객용</title>
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
    let existAlchol = 0;

    function addOrder(menu,price){
      alert('추가완료. 1개 이상시 또 눌러주세요 ^^/');
        var my_tbody = document.getElementById('my-tbody');
        // var row = my_tbody.insertRow(0); // 상단에 추가
        var row = my_tbody.insertRow( my_tbody.rows.length-1 ); // 하단에 추가
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = menu;
        cell2.innerHTML = price;

        var result = $('#result').html()*1 + price*1;
        $('#result').html(result);
        $('#sumPrice').val(result);
        $('#menuStr').val(menu+'@@@'+$('#menuStr').val());
      }
      function test(){
        var menuStr = $('#menuStr').val();
        var sumPrice = $('#sumPrice').val();
        alert(menuStr);
        alert(sumPrice);
      }
     function addAlchol(menu,price){
        existAlchol = existAlchol + 1;
        alert('추가완료. 주문내역을 확인해주세요 ^^/');
        var my_tbody = document.getElementById('my-tbody');
        // var row = my_tbody.insertRow(0); // 상단에 추가
        var row = my_tbody.insertRow( my_tbody.rows.length-1 ); // 하단에 추가
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        if(menu == '참이슬')
          var cnt = $('#soju').val();
        else
          var cnt = $('#cass').val();
        cell1.innerHTML = menu +' '+cnt+'병';
        cell2.innerHTML = price*1 * cnt;

        var result = $('#result').html()*1 + (price*1) *cnt;
        $('#result').html(result);
        $('#sumPrice').val(result);
        $('#menuStr').val(menu +' '+cnt+'병'+'@@@'+$('#menuStr').val());
      }
      function test(){
        //var menuStr = $('#menuStr').val();
        //var sumPrice = $('#sumPrice').val();
        //alert(menuStr);
        //alert(sumPrice);
        if ( existAlchol == 0){
          alert('ㅉ ?');
          alert('술이없네요 .....?');
          alert('이거 실화인가요 .....?');
        }
        else
          alert("어리게 보이시긴 하지만...\n그래도 형식상 신분증 검사하겠습니다 ~ \n죄송합니다. 협조 부탁드려요 ~");
        document.getElementById("myForm").submit();
      }

  </script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">주문ㄱㄱ</a>
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
          <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
          <i class="fa fa-heart"></i> 정보입력</div>
         <div class="card-body">
        <form method='post' action='DB/order.php' id='myForm'>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-2 ">
                <label for="exampleInputName"><i class="fa fa-credit-card"></i> 입금 방식</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="현금"> 현금　
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="계좌이체"> 계좌이체　
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="토스"> 토스
                  </label>
              </div>
              <div class="col-md-2 ">
                <br>
                <label for="exampleInputName"><i class="fa fa-user"></i> 테이블 번호</label>
                <input class="form-control" id="exampleInputName" type="number" aria-describedby="nameHelp" placeholder="Enter Table No" name="tableno" style='border-color: red;'>
              </div>

              <div class="col-md-1">
                <br>
                <label for="exampleInputLastName"><i class="fa fa-list"></i> 주문 내역</label> 
                <input type="button" class="btn btn-danger form-control btn-sm"  aria-describedby="nameHelp" value="주문 초기화" style='width:30%;display: inline;float: right;' onClick="window.location.reload()">
                <div class="table-responsive table-striped">
                  <table class="table">
                    <thead>
                      <td>이름</td>
                      <td>가격</td>
                    </thead>
                    <tbody id="my-tbody"></tbody>
                    <tfoot>
                      <td>총</td>
                      <td id='result'>0</td>
                      <input type='hidden' id='menuStr' name ='menuStr'  value=''/>
                      <input type='hidden' id='sumPrice' name ='sumPrice' value=''/>
                    </tfoot>
                  </table>
                </div>
                
              </div>
            </div>
          </div>
          <button type='button' class="btn btn-primary btn-block" onclick='test()'>주문하기</button>
        </form>
      </div>
      </div>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-cutlery"></i> 안주류</div>
        <div class="card-body">
          <div class="row">
            <div style="width: 50%;">
              <div class="thumbnail">
                <img src="img/제육.jpg" alt="..." style='width: 90%; min-height:150px; max-height:150px;display: block;'>
                <div class="caption">
                  <h3>제육</h3>
                  <p>4,500원</p>
                  <p><button class="btn btn-primary btn-xs" role="button" onclick="addOrder('제육','4500');">주문하기</button>
                  </p>
                </div>
              </div>
            </div>

            <div style="width: 50%;">
              <div class="thumbnail">
                <img src="img/두부.jpg" alt="..." style='width: 90%; min-height:150px; max-height:150px;display: block;'>
                <div class="caption">
                  <h3>두부김치</h3>
                  <p>4,000원</p>
                  <p><button class="btn btn-primary btn-xs" role="button"  onclick="addOrder('두부','4000')">주문하기</button></p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div style="width: 50%;">
              <div class="thumbnail">
                <img src="img/새볶.jpg" alt="..." style='width: 90%;min-height:150px; max-height:150px;display: block;'>
                <div class="caption">
                  <h3>새우볶음밥</h3>
                  <p>5,000원</p>
                  <p><button class="btn btn-primary btn-xs" role="button"  onclick="addOrder('새볶','5000')">주문하기</button></p>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-tint"></i> 주류/음류</div>
        <div class="card-body">
          <div class="row">

            <div style="width: 50%;">
              <div class="thumbnail">
                <img src="img/참이슬.jpg" alt="..." style='width: 90%; min-height:150px; max-height:150px;display: block;'>
                <div class="caption">
                  <h3>참이슬</h3>
                  <p>3,000원</p>
                  <p>
                    <input id='soju' class="form-control" type="number" style='width:30%;display: inline;border-color: red;' value='1'>
                    <span class="input-group-addon">병 </span>
                    <button class="btn btn-primary btn-xs" role="button" onclick="addAlchol('참이슬','3000')">주문하기</button></p>
                </div>
              </div>
            </div>
            <div style="width: 50%;">
              <div class="thumbnail">
                <img src="img/카스.jpg" alt="..." style='width: 90%; min-height:150px; max-height:150px;display: block;'>
                <div class="caption">
                  <h3>카스</h3>
                  <p>4,000원</p>
                  <p>
                    <input id='cass' class="form-control" type="number" style='width:30%;display: inline;border-color: red;' value='1'>
                    <span class="input-group-addon">병 </span>
                    <button class="btn btn-primary btn-xs" role="button" onclick="addAlchol('카스','4000')">주문하기</button></p>
                </div>
              </div>
            </div>

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
      
    
    </script>
  </div>
</body>

</html>
