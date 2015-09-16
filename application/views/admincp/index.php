<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/backend');?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/backend');?>/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('assets/backend');?>/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/backend');?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
       <?php $this->load->view('admincp/widget/menu'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <?php $this->load->view('admincp/_main');?>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/backend');?>/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/backend');?>/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('assets/backend');?>/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url('assets/backend');?>/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url('assets/backend');?>/js/plugins/morris/morris-data.js"></script>
    <script>
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $("#createuser").submit(function( event ) {
                  username = $('#input-user').val();
                  pass = $('#input-pass').val();
                  repeat = $('#input-pass-repeat').val();
                  if(pass.length <6 || pass.length >15){
                      alert("password 6~15 character");
                      return false;
                  }
                  if(pass !== repeat){
                      alert("password not same");
                      return false;
                  }
                  submit = this;
                  $.ajax({type: 'POST', dataType: 'json', url: baseUrl+"/admin/user/ajaxcheck",
                              data: {
                                  'action': "username",
                                  'username': username,
                                  'pass': pass,
                                  'repeat': repeat
                              },
                              success: function(data) {
                                if (data.status == true) {
                                    submit.submit();
                                }else{
                                    alert("Username exit");
                                }
                              }
                });
               event.preventDefault();  
      });
        $(document).on("click", "#changeactive",function () {
            click = this;
//            alert("ok");
//            $(this).prop('disabled', true);
            id = $(this).parent().parent().find('td').first().text();
//            alert("id : "+ id);
//            $.ajax({type: 'POST', dataType: 'json', url: baseUrl+"/admin/user/ajaxcheck",
//                              data: {
//                                  'action': "changeactive",
//                                  'id': username
//                              },
//                              success: function(data) {
//                                if (data.status == true) {
//                                    submit.submit();
//                                }else{
//                                    alert("Username exit");
//                                }
//                              }
//            });
        });
    </script>
</body>

</html>
