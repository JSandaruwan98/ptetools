<?php
require_once '../../../check_role/checkRole.php';
checkRole('admin');

$_SESSION['page_name'] = 'Evaluation History';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>JQuery Datatable Example</title>
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
   <!-- Nucleo Icons -->
   <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
   <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
   <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
   <!-- Material Icons -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
   <!-- CSS Files -->
   <link rel="stylesheet" href="./assets/css/material-dashboard.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <style>
       .my-button:hover {
           border: 1px solid rgb(60, 41, 116)
       }
   </style>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    

	<script type="text/javascript">
		  $(document).ready(function() {
        var table = new DataTable('#jquery-datatable-example-no-configuration', {
          lengthMenu: [
            [5, 10, 50, -1],
            [5, 10, 50, 'All']
          ],
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
            'url':'pages/admin/view/ajaxTable.php',
            'data': function(data) {
                data.tableName = 'student';
                data.type = 'eval_history'
            }
          },
          'columns': [
            { data: 'student_id' },
            { data: 'student_name' },
            { data: 'assigned_on' },
            { data: 'attempted_on' },
            { data: 'evaluation_on' },
            { data: 'test_name' },
            { data: 'test_id', visible: false },
            {
                data: 'action',
                render: function(data, type, row) {
                    // Generate button HTML for the action column
                    return '<a class="pending_sheet text-primary" style="cursor: pointer;">evaluation sheet</a>';
                }
            }
          ]
        });

        table.on('click', '.pending_sheet', function() {
          var rowData = table.row($(this).closest('tr')).data(); 
          var test_id = rowData.test_id;
          var student_id = rowData.student_id;

          var url = "index.php?url=/Evaluation&tid="+test_id+"&sid="+student_id+"#1";
          var newTab = window.open('', '_blank');
          newTab.location.href = url;
        })

      });
	</script>
</head>
<body>
    <?php require '../../../navbar/navbar.php'?>
    
	<div class="container mt-3">
      <div class="row">
        <div class="card my-4">
            <div class="card-header view-tables-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="border-radius-lg pt-4 pb-3">
                <h6 id="table-name" class="text-white text-capitalize ps-3">History Table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-3">
                  <table id="jquery-datatable-example-no-configuration" class="table-striped" data-page-length='5' style="font-size: 90%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Assigned On</th>
                            <th>Attempted On</th>
                            <th>Evaluated On</th>
                            <th>Test</th>
                            <th>Test_id</th>
                            <th></th>
                        </tr>
                    </thead> 
                  </table>
                </div>
            </div>
        </div>
      </div>	
	</div>


	</div>
	

</body>
</html>