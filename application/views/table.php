<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-success pull-left btn-sm" id="add_part_modal">
            <span class="glyphicon glyphicon-plus-sign"></span>
            Add Part
            </a>
        </div>
    </div>
    <div class="row"><p> </p></div>
</div>
<div class="container">
<?php echo $tabledata ?>
</div>


<div class="modal fade" id="Add_component_modal" tabindex="-1" role="dialog" aria-labelledby="Add Component" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Part</h4>
      </div>
      <div class="modal-body">
          <div class="control-group row">
              <div id="addcomperror" class="alert alert-danger text-center">...</div>
          </div>
          <div class="control-group row">
            <label for="cat_select" class="col-sm-3 control-label">Category</label>
            <div class="col-sm-9">
                <select class="form-control" id="cat_select"></select>
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
              <label for="partName" class="col-sm-3 control-label">Name <span class="color-red">*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="partName" placeholder="Name">
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="footp_select" class="col-sm-3 control-label">Footprint</label>
            <div class="col-sm-9">
                <select class="form-control" id="footp_select"></select>
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="description" class="col-sm-3 control-label">Description</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="description" placeholder="Short Description">
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="location" class="col-sm-3 control-label">Location</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="location" placeholder="Storage Location">
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="quantity" class="col-sm-3 control-label">Quantity</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="quantity" placeholder="Quantity" value="1">
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="manuf_select" class="col-sm-3 control-label">Manufacturer</label>
            <div class="col-sm-9">
                <select class="form-control" id="manuf_select"></select>
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="datasheet" class="col-sm-3 control-label">Datasheet</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="datasheet" placeholder="Datasheet URL">
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="dist_select" class="col-sm-3 control-label">Distributor</label>
            <div class="col-sm-9">
                <select class="form-control" id="dist_select"></select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add_part">Add</button>
      </div>
    </div>
  </div>
</div>

   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/1.3.1/lodash.min.js"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery.dynatable.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery.jeditable.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/bootbox.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/noty/packaged/jquery.noty.packaged.js') ?>"></script>

<script>
    function AddEditToTable()
    {
        $('#voorbeeld_table tr').each(function() {
        var data = $(this).find("td").eq(10);  
        var id = $(this).find("td").eq(0).html();  
        //console.log(id);
        data.html("<button id=\"" +id+ "\"type=\"button\" class=\"editbuttonplus btn btn-primary btn-xs\"><span class=\"glyphicon glyphicon-plus\"></span></button>\n\
                   <button id=\"" +id+ "\"type=\"button\" class=\"editbuttonmin btn btn-primary btn-xs\"><span class=\"glyphicon glyphicon-minus\"></span></button>\n\
                   <button id=\"" +id+ "\"type=\"button\" class=\"editbuttonedit btn btn-info btn-xs\"><span class=\"glyphicon glyphicon-edit\"></span></button>\n\
                   <button id=\"" +id+ "\"type=\"button\" class=\"editbuttondelete btn btn-danger btn-xs\"><span class=\"glyphicon glyphicon-trash\"></span></button>\n\
                    ");
        });
    }
    
    function UpdateTable()
    {
         var tabledata = $('#voorbeeld_table').dynatable();
         $.getJSON("<?php echo  base_url('data/get_components')?>", function(result) {
             console.log("Update from json");
             console.log(result);
             var tabl = $('#voorbeeld_table').dynatable({
                 dataset: {records: result}
             }).data('dynatable');
             tabl.settings.dataset.originalRecords = result;
             tabl.process();
        });
    }
    
    function IncrementComponent(id)
    {
        $.post( "<?php echo  base_url('data/incr_component')?>", {idval : id}, function( data ) {
            console.log(data);
            UpdateTable();
            GenerateSuccess("Component Incremented");
        });
    }
    
    function DecrementComponent(id)
    {
        $.post( "<?php echo  base_url('data/decr_component')?>", {idval : id}, function( data ) {
            console.log(data);
            UpdateTable();
            GenerateSuccess("Component Decremented");
        });
    }
    
    function DeleteComponent(id)
    {
        bootbox.confirm("Are you sure tou want to delete component with ID=" + id + "?", function(result) {
            if(result === true)
            {
                console.log("Delete");
                $.post( "<?php echo  base_url('data/delete_component')?>", {idval : id}, function( data ) {
                    console.log(data);
                    UpdateTable();
                    GenerateSuccess("Component Deleted");
                });
            }
            else
            {
                console.log("Delete Canceled");
            }
            //Example.show("Confirm result: "+result);
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
    
   $( document ).ready(function() {
     var tabledata = $('#voorbeeld_table').dynatable();     //Init Dynatable
     AddEditToTable();                                      //Add edit buttons to table
     $("#addcomperror").hide();                             //Hide error in modal
     //Edit buttons events These are copied to afterprocess
     $('.editbuttonplus').on('click', function (e) {        
        console.log("Add one! ID=" + $(this).attr('id'));
        var id = $(this).attr('id');      
        IncrementComponent(id);
     });
     $('.editbuttonmin').on('click', function (e) {        
        console.log("Minus one! ID=" + $(this).attr('id'));
        var id = $(this).attr('id');
        DecrementComponent(id);
     });
     $('.editbuttonedit').on('click', function (e) {        
        console.log("Edit ID=" + $(this).attr('id'));
        generate('top');
     });
     $('.editbuttondelete').on('click', function (e) {        
        console.log("Delete ID=" + $(this).attr('id'));
        var id = $(this).attr('id');
        DeleteComponent(id);
     });
});

$('#voorbeeld_table').on('dynatable:afterProcess', function (e) {
    console.log("After process");
    AddEditToTable();
    //Edit buttons events These are copied from Dom ready
     $('.editbuttonplus').on('click', function (e) {        
        console.log("Add one! ID=" + $(this).attr('id'));
        var id = $(this).attr('id');      
        IncrementComponent(id);
     });
     $('.editbuttonmin').on('click', function (e) {        
        console.log("Minus one! ID=" + $(this).attr('id'));
        var id = $(this).attr('id');
        DecrementComponent(id);
     });
     $('.editbuttonedit').on('click', function (e) {        
        console.log("Edit ID=" + $(this).attr('id'));
     });
     $('.editbuttondelete').on('click', function (e) {        
        console.log("Delete ID=" + $(this).attr('id'));
        var id = $(this).attr('id');
        DeleteComponent(id);
     });
});

$('#voorbeeld_table').on('dynatable:afterUpdate', function (e) {
 console.log("Actie");
  
    
});



$('#add_part_modal').on('click', function (e) {
    console.log("Add part launch modal");
     $.getJSON("<?php echo  base_url('data/get_categories')?>", function(result) {
        var options = $("#cat_select");
        //console.log(result);
        $.each(result, function(i, item) {
            console.log(item.Cat_name);
            options.append($("<option />").val(item.id).text(item.Cat_name));
        });
    });
    $.getJSON("<?php echo  base_url('data/get_footprints')?>", function(result) {
        var options = $("#footp_select");
        //console.log(result);
        $.each(result, function(i, item) {
            //console.log(item.id);
            options.append($("<option />").val(item.id).text(item.Footp_name));
        });
    });
    $.getJSON("<?php echo  base_url('data/get_manufacturers')?>", function(result) {
        var options = $("#manuf_select");
        //console.log(result);
        $.each(result, function(i, item) {
            //console.log(item.id);
            options.append($("<option />").val(item.id).text(item.Manuf_name));
        });
    });
    $.getJSON("<?php echo  base_url('data/get_distributors')?>", function(result) {
        var options = $("#dist_select");
        //console.log(result);
        $.each(result, function(i, item) {
            //console.log(item.id);
            options.append($("<option />").val(item.id).text(item.Dist_name));
        });
    });
    $('#Add_component_modal').modal();
});

$('#add_part').on('click', function (e) {
    console.log("Add part to DB");
    $("#addcomperror").hide();
    var category = $("#cat_select").val();
    var partname = $("#partName").val();
    var footprint = $("#footp_select").val();
    var description = $("#description").val();
    var location = $("#location").val();
    var quantity = $("#quantity").val();
    var manufacturer = $("#manuf_select").val();
    var datasheet = $("#datasheet").val();
    var distributor = $("#dist_select").val();
    console.log("Category: "+ category);
    console.log("Partname: "+ partname);
    console.log("Footprint: "+ footprint);
    console.log("description: "+ description);
    console.log("location: "+ location);
    console.log("quantity: "+ quantity);
    console.log("Manufacturer: "+ manufacturer);
    console.log("datasheet: "+ datasheet);
    console.log("Distributor: "+ distributor);
    if(partname.length >0)
    {
        if($.isNumeric(quantity))
        {
            var jsondata = {};
            jsondata["Categories_id"] = category;
            jsondata["Nam"] = partname;
            jsondata["Footprints_id"] = footprint;
            jsondata["Description"] = description;
            jsondata["Location"] = location;
            jsondata["Quantity"] = quantity;
            jsondata["Manufacturers_id"] = manufacturer;
            jsondata["Datasheet"] = datasheet;
            jsondata["Distributors_id"] = distributor;
            console.log(jsondata);
            $.post( "<?php echo  base_url('data/add_component')?>", jsondata, function( data ) {
                //$( ".result" ).html( data );
                UpdateTable();
                GenerateSuccess("Part added");
            });
            
        }
        else
        {
            $("#addcomperror").show();
            $("#addcomperror").text("Quantity is not a number");
        }
    }
    else
    {
        $("#addcomperror").show();
        $("#addcomperror").text("No partname entered");
    }
});

/*$(function () {
    $("td").dblclick(function () {
        var OriginalContent = $(this).text();
          
        $(this).addClass("cellEditing");
        $(this).html("<input type='text' value='" + OriginalContent + "' />");
        $(this).children().first().focus();
  
        $(this).children().first().keypress(function (e) {
            if (e.which == 13) {
                var idval = $(this).parent().parent().children()[0];
                console.log(idval);
                var newContent = $(this).val();
                $(this).parent().text(newContent);
                $(this).parent().removeClass("cellEditing");
            }
        });
          
    $(this).children().first().blur(function(){
        $(this).parent().text(OriginalContent);
        $(this).parent().removeClass("cellEditing");
    });
    });
});*/


//Read more: http://mrbool.com/how-to-create-an-editable-html-table-with-jquery/27425#ixzz2vOzqy8M9
 </script>