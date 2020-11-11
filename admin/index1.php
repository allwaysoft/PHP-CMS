<html>  
  <head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
   <meta http-equiv="content-language" content="zh-CN" />  
      <title>Inline Table Insert Update Delete in PHP using jsGrid</title>  
      <script src="jquery.min.js"></script>
      <link type="text/css" rel="stylesheet" href="jsgrid.min.css" />
      <link type="text/css" rel="stylesheet" href="jsgrid-theme.min.css" />
      <script type="text/javascript" src="jsgrid.min.js"></script>
      <script src="i18n/jsgrid-zh-cn.js"></script>
      <style>
      .hide
      {
         display:none;
      }
      </style>
  </head>  
  <body>  
    <div class="container">  
    <br />
      <div class="table-responsive">  
      <h3 align="center">Inline Table Insert Update Delete in PHP using jsGrid</h3><br />
      <div id="grid_table"></div>
      </div>  
    </div>
  </body>  
</html>  
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
        url: "fetch_data.php",
        data: filter
       });
      },
      insertItem: function(item){
       return $.ajax({
        type: "POST",
        url: "fetch_data.php",
        data:item
       });
      },
      updateItem: function(item){
       return $.ajax({
        type: "PUT",
        url: "fetch_data.php",
        data: item
       });
      },
      deleteItem: function(item){
       return $.ajax({
        type: "DELETE",
        url: "fetch_data.php",
        data: item
       });
      },
      },

      fields: [
        {
          name: "id",
          type: "hidden",
          css: 'hide'
        },
        {
          name: "first_name", 
          type: "text", 
          width: 150, 
          validate: "required"
        },
        {
          name: "last_name", 
          type: "text", 
          width: 150, 
          validate: "required"
        },
        {
          name: "age", 
          type: "number", 
          width: 50, 
          validate: function(value)
          {
            if(value > 0)
            {
              return true;
            }
          }
        },
        {
          name: "gender", 
          type: "select", 
          items: [
                  { Name: "", Id: '' },
                  { Name: "Male", Id: 'male' },
                  { Name: "Female", Id: 'female' }
          ], 
          valueField: "Id", 
          textField: "Name", 
          validate: "required"
        },
        {
          type: "control"
        }
      ]

    });

</script>