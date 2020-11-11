<?php include "includes/header.php" ?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

<!-- Sidebar -->
<?php include "includes/sidebar.php" ?>

<div id="content-wrapper">

    <div class="container-fluid">
        <!-- Page Content -->
        <h2 class="text-center">管理目录</h2>
        <hr>


        
        <diV class="row" style="background-color:white; color:#181e22;" >        
        <div id="grid_table"></div>
      
      
      <script src="jquery.min.js"></script>
      <link type="text/css" rel="stylesheet" href="jsgrid.min.css" />
      <link type="text/css" rel="stylesheet" href="jsgrid-theme.min.css" />
      <script type="text/javascript" src="jsgrid.min.js"></script>
      <script src="i18n/jsgrid-zh-cn.js"></script>
        <script>
	jsGrid.locale("zh-cn");
    $('#grid_table').jsGrid({

      width: "100%",
      height: "600px",

      filtering: true,
      inserting:true,
      editing: true,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 10,
      pageButtonCount: 5,
      deleteConfirm: "Do you really want to delete data?",

      controller: {
      loadData: function(filter){
       return $.ajax({
        type: "GET",
        url: "fetch_category.php",
        data: filter
       });
      },
      insertItem: function(item){
       return $.ajax({
        type: "POST",
        url: "fetch_category.php",
        data:item
       });
      },
      updateItem: function(item){
       return $.ajax({
        type: "PUT",
        url: "fetch_category.php",
        data: item
       });
      },
      deleteItem: function(item){
       return $.ajax({
        type: "DELETE",
        url: "fetch_category.php",
        data: item
       });
      },
      },

      fields: [
        {
          title: "编号",
          name: "cat_id",
          type: "hidden",
          css: 'hide'
        },
        {
          title: "目录标题",
          name: "cat_title", 
          type: "text", 
          width: 150, 
          validate: "required"
        },
        {
          title: "目录创建者",
          name: "cat_creator", 
          type: "text", 
          width: 150, 
          validate: "required"
        },
        {
          type: "control"
        }
      ]

    });

</script>
        </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>