
      <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                <?PHP $Data=1; ?>
                <?php if(isset($SidebarUserPanel)) echo $SidebarUserPanel; ?>
          <!-- End Sidebar user panel -->
          
          <!-- search form -->
                <?php if(isset($SearchForm)) echo $SearchForm; ?>
          <!-- End.search form -->
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
                <?php if(isset($SidebarMenu)) echo $SidebarMenu; ?>
          <!-- End sidebar menu: : style can be found in sidebar.less -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <?PHP //var_dump($this->session->userdata()); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          
            
        <!-- Content Header (Page header) -->
            <?php   //if(isset($ContentHeader)) echo $ContentHeader; ?>
        <!-- End Content Header (Page header) -->
        <!-- Main content -->
            <?php // $this->load->view('layout/Bady/MainContent',$Data); ?>
        <!--  End Main content -->
            <script type="text/javascript">
        $(document).ready (function(){
                $("#alert").hide();
                $("#alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
        });
    </script>
<div id="alertDialogscs"   style="display: none; "  >
    <div class="alert alert-success alert-dismissable" id="alert" style=" background-color: #00ca6d;" >
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> رسالة النظام!</h4>      تمت العملية بنجاح... <br>
    </div>
</div>
<div id="alertDialogerr" style="display: none">
    <div class="alert alert-error alert-dismissable"  id="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>	<i class="icon fa fa-info-circle"></i> رسالة النظام!</h4>
         العملية غير مكتملة الرجاء التاكد ... <br>
    </div>
</div>
<div id="alertValidation" style="display: none">
    <div class="alert alert-error alert-dismissable"  id="">
<!--        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>-->
        <h4>	<i class="icon fa fa-info-circle"></i> رسالة النظام!</h4>
         العملية غير مكتملة الرجاء التاكد ... <br><br>
         <div  id="alertValidationErr"></div>
    </div>
</div>

      <!-- End Content Wrapper. Contains page content -->
     