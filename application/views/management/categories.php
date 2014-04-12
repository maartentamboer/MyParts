<div class="container">

  <!-- The add button section -->
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
          <a class="btn btn-success pull-left btn-sm" id="add_category_modal">
          <span class="glyphicon glyphicon-plus-sign"></span>
          Add Category
          </a>
      </div>
  </div>
  <div class="row"><p> </p></div> <!-- Empty line -->

  <!-- The table with the data -->
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h4>Categories</h4>
      <table class="table table-striped table-hover" id="cat-table">
        <thead>
          <th>ID</th>
          <th>Name</th>
          <th>Edit</th>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Javascripts -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/1.3.1/lodash.min.js"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.dynatable.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootbox.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/noty/packaged/jquery.noty.packaged.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>

  <!-- All the stuff that makes the page work -->
  <!-- It's like 'magic' :-D -->
  <script>

    //This is quite dirty, but it works
    var CatTableNames = new Array(100);

  /*
   * Functions
   */

    function UpdateTable()
    {
      console.log("Updating table");
      $.getJSON("<?php echo  base_url('data/management_get_categories')?>", function(result) {
        var tabl = $('#cat-table').dynatable({
          dataset: {
            records: result
          }
        }).data('dynatable');
        tabl.settings.dataset.originalRecords = result;
        //AddEditToTable();  //Add buttons to the table
        tabl.process();
      });
    }

    function AddEditToTable()
    {
      console.log("Adding edit to table");
      $('#cat-table tr').each(function() {
      var data = $(this).find("td").eq(2);
      var id = $(this).find("td").eq(0).html();
      var name = $(this).find("td").eq(1).html();
      CatTableNames[id] = name;
      console.log(id);
      console.log("Name: " + name);
      //console.log(id);
      data.html("<button id=\"" +id+ "\"type=\"button\" class=\"editbuttonedit btn btn-info btn-xs\"><span class=\"glyphicon glyphicon-edit\"></span></button>\n\
                 <button id=\"" +id+ "\"type=\"button\" class=\"editbuttondelete btn btn-danger btn-xs\"><span class=\"glyphicon glyphicon-trash\"></span></button>\n\
               ");
      });
    }

    function GenerateSuccess(text) {
        var n = noty({
            text        : text,
            type        : 'success',
            dismissQueue: true,
            layout      : 'top',
            theme       : 'defaultTheme'
        });
        setTimeout(function () {
            $.noty.close(n.options.id);
        }, 3000);
        //console.log('html: ' + n.options.id);
    }

    function GenerateError(text) {
        var n = noty({
            text        : text,
            type        : 'error',
            dismissQueue: true,
            layout      : 'top',
            theme       : 'defaultTheme'
        });
        setTimeout(function () {
            $.noty.close(n.options.id);
        }, 3000);
        //console.log('html: ' + n.options.id);
    }

    function DeleteCategory(id)
    {
      if(id == 1)
      {
        GenerateError("Category with ID 1 cannot be deleted")
      }
      else
      {
        $.post( "<?php echo  base_url('data/management_get_affected_from_cat')?>", {cat_id : id}, function( data ) {
            var obj = $.parseJSON(data);
            comp_affected = obj.number;
            msg = "Are you sure tou want to delete category with Name: <i>" + CatTableNames[id] + "</i>";
            msg += "<br/>This will set the category of the components of this id to id 1.";
            msg += "<br/>The number of components affected by this is: <i>" + comp_affected + "</i>";
            msg += "<br/> a list (max 10) of the affected components:<br/>";
            msg += obj.table;
            bootbox.confirm(msg, function(result) {
              if(result === true)
              {
                //Post to delete the component
                $.post( "<?php echo  base_url('data/management_delete_category')?>", {cat_id : id}, function( data ) {});
                //Update the table so that the deleted item is removed from view
                GenerateSuccess("Category removed");
                UpdateTable();
              }
              else
              {
                //Do nothing
              }
            });
        });
      }
    }

    function AddCategory(name)
    {
      if(name == "")  //Check for empty name
      {
        GenerateError("The entered category name is empty");
      }
      else
      {
        $.post( "<?php echo  base_url('data/management_add_category')?>", {Cat_name : name}, function( data ) {
          //TODO implement return result in php to check for doubles
          GenerateSuccess("Category added");
          UpdateTable();
        });
      }
    }

    /*
     * Event handlers
     */

    $( document ).ready(function() {
      //Fetch the categories as JSON
      $.getJSON("<?php echo  base_url('data/management_get_categories')?>", function(result) {
        //Make the table object
        $('#cat-table').dynatable({
          dataset: {
            records: result
          }
        }).data('dynatable');
        //Add edit buttons to the table
        AddEditToTable();
        //Button events
        $('.editbuttonedit').on('click', function (e) {
           console.log("Edit ID=" + $(this).attr('id'));
           var id = $(this).attr('id');
        });
        $('.editbuttondelete').on('click', function (e) {
           console.log("Delete ID=" + $(this).attr('id'));
           var id = $(this).attr('id');
           DeleteCategory(id);
        });
      }); //End of getJSON
    }); //End of DOM ready


    $('#cat-table').on('dynatable:afterProcess', function (e) {
      AddEditToTable();
      /*  Button events  again some sort of bug */
      /*  Or a jquery/javascript feature? */
      $('.editbuttonedit').on('click', function (e) {
         console.log("Edit ID=" + $(this).attr('id'));
         var id = $(this).attr('id');
      });
      $('.editbuttondelete').on('click', function (e) {
         console.log("Delete ID=" + $(this).attr('id'));
         var id = $(this).attr('id');
         DeleteCategory(id);
      });
    });

    $('#add_category_modal').on('click', function (e) {
      bootbox.prompt("Add category", function(result) {
        if (result === null) {
          console.log("Prompt dismissed");
        } else {
          console.log("Add category: "+result);
          AddCategory(result);
        }
      });
    });

  </script>
</div> <!-- /container -->
