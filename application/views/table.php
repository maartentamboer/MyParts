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
    Category:
    <select id="search-category" name="category">
        <option></option>
    </select>
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
          <input id="multipart" type="checkbox" name="MultiPart" value="MultiPart"> MultiPart
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add_part">Add</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Change_component_modal" tabindex="-1" role="dialog" aria-labelledby="Change Component" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Change Part</h4>
      </div>
      <div class="modal-body">
          <div class="control-group row">
              <div id="changecomperror" class="alert alert-danger text-center">...</div>
          </div>
          <div class="control-group row">
            <label for="cat_select" class="col-sm-3 control-label">ID </label>
            <div class="col-sm-9">
                <p id="change_id"> </p>
            </div>
          </div>
          <div class="control-group row">
            <label for="cat_select" class="col-sm-3 control-label">Category</label>
            <div class="col-sm-9">
                <select class="form-control" id="change_cat_select"></select>
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
              <label for="partName" class="col-sm-3 control-label">Name <span class="color-red">*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="change_partName" placeholder="Name">
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="footp_select" class="col-sm-3 control-label">Footprint</label>
            <div class="col-sm-9">
                <select class="form-control" id="change_footp_select"></select>
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="description" class="col-sm-3 control-label">Description</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="change_description" placeholder="Short Description">
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="location" class="col-sm-3 control-label">Location</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="change_location" placeholder="Storage Location">
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="quantity" class="col-sm-3 control-label">Quantity</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="change_quantity" placeholder="Quantity" value="1">
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="manuf_select" class="col-sm-3 control-label">Manufacturer</label>
            <div class="col-sm-9">
                <select class="form-control" id="change_manuf_select"></select>
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="datasheet" class="col-sm-3 control-label">Datasheet</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="change_datasheet" placeholder="Datasheet URL">
            </div>
          </div>
          <p> </p>
          <div class="control-group row">
            <label for="dist_select" class="col-sm-3 control-label">Distributor</label>
            <div class="col-sm-9">
                <select class="form-control" id="change_dist_select"></select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="change_part">Update</button>
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
        var data = $(this).find("td").eq(8);  
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
         //var tabledata = $('#voorbeeld_table').dynatable();
         $.getJSON("<?php echo  base_url('data/get_components')?>", function(result) {
             console.log("Update from json");
             console.log(result);
             var tabl = $('#voorbeeld_table').dynatable({
                 dataset: {records: result},
                 readers: {
                    'id': function(el, record) {
                      return Number(el.innerHTML) || 0;
                    },
                   'quantity': function(el, record) {
                     return Number(el.innerHTML) || 0;
                   }
                 }
             }).data('dynatable');
             tabl.settings.dataset.originalRecords = result;
             tabl.process();
             var dynatable = $('#voorbeeld_table').dynatable({
                readers: {
                   'id': function(el, record) {
                     return Number(el.innerHTML) || 0;
                   },
                   'quantity': function(el, record) {
                     return Number(el.innerHTML) || 0;
                   }
                }
            }).data('dynatable');     //Init Dynatable
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
    
    function EditComponent(id)
    {
        //console.log("Add part launch modal");
        //Clear out all options
        $("#change_cat_select option").remove();
        $("#change_footp_select option").remove();
        $("#change_manuf_select option").remove();
        $("#change_dist_select option").remove();
        $.getJSON("<?php echo  base_url('data/get_categories')?>", function(result) {
           var options = $("#change_cat_select");
           //console.log(result);
           $.each(result, function(i, item) {
               console.log(item.Cat_name);
               options.append($("<option />").val(item.id).text(item.Cat_name));
           });
       });
       $.getJSON("<?php echo  base_url('data/get_footprints')?>", function(result) {
           var options = $("#change_footp_select");
           //console.log(result);
           $.each(result, function(i, item) {
               //console.log(item.id);
               options.append($("<option />").val(item.id).text(item.Footp_name));
           });
       });
       $.getJSON("<?php echo  base_url('data/get_manufacturers')?>", function(result) {
           var options = $("#change_manuf_select");
           //console.log(result);
           $.each(result, function(i, item) {
               //console.log(item.id);
               options.append($("<option />").val(item.id).text(item.Manuf_name));
           });
       });
       $.getJSON("<?php echo  base_url('data/get_distributors')?>", function(result) {
           var options = $("#change_dist_select");
           //console.log(result);
           $.each(result, function(i, item) {
               //console.log(item.id);
               options.append($("<option />").val(item.id).text(item.Dist_name));
           });
            //This is nested because the distributors will take the longest to load
            //The rest will load parallel
            $.post( "<?php echo  base_url('data/get_component')?>", {idval : id}, function( data ) {
                var obj = $.parseJSON(data);
                console.log(obj[0]);
                console.log(obj[0].Nam);                
                $("#change_id").text(id);
                $("#change_partName:text").val(obj[0].Nam);
                $("#change_description:text").val(obj[0].Description);
                $("#change_location:text").val(obj[0].Location);
                $("#change_quantity:text").val(obj[0].Quantity);
                $("#change_datasheet:text").val(obj[0].Datasheet);                
                $("#change_cat_select").val(obj[0].Categories_id);
                $("#change_footp_select").val(obj[0].Footprints_id);
                $("#change_manuf_select").val(obj[0].Manufacturers_id);
                $("#change_dist_select").val(obj[0].Distributors_id);
            });
            
       });
       //This will load parallel. It gives the user the impression that the system is faster
       $('#Change_component_modal').modal();
       
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
    $.getJSON("<?php echo  base_url('data/get_categories')?>", function(result) {
        var options = $("#search-category");
        //console.log(result);
        $.each(result, function(i, item) {
            options.append($("<option />").val(item.Cat_name).text(item.Cat_name));
        });
    });
     var dynatable = $('#voorbeeld_table').dynatable({
         readers: {
            'id': function(el, record) {
              return Number(el.innerHTML) || 0;
            },
            'quantity': function(el, record) {
              return Number(el.innerHTML) || 0;
            }
         }
     }).data('dynatable');     //Init Dynatable
     AddEditToTable();                                      //Add edit buttons to table
     $("#addcomperror").hide();                             //Hide error in modal
     $("#changecomperror").hide();  
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
        var id = $(this).attr('id');
        EditComponent(id);
        //generate('top');
     });
     $('.editbuttondelete').on('click', function (e) {        
        console.log("Delete ID=" + $(this).attr('id'));
        var id = $(this).attr('id');
        DeleteComponent(id);
     });
     $('#search-category').change( function() {
        var value = $(this).val();
        if (value === "") {
          dynatable.queries.remove("category");
        } else {
          dynatable.queries.add("category",value);
          console.log(value);
        }
        //UpdateTable();      
        dynatable.process();
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
        var id = $(this).attr('id');
        EditComponent(id);
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
    $("#cat_select option").remove();
    $("#footp_select option").remove();
    $("#manuf_select option").remove();
    $("#dist_select option").remove();
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


$('#change_part').on('click', function (e) {
    console.log("Change part in DB");
    $("#changecomperror").hide();
    var id = $("#change_id").text();
    var category = $("#change_cat_select").val();
    var partname = $("#change_partName").val();
    var footprint = $("#change_footp_select").val();
    var description = $("#change_description").val();
    var location = $("#change_location").val();
    var quantity = $("#change_quantity").val();
    var manufacturer = $("#change_manuf_select").val();
    var datasheet = $("#change_datasheet").val();
    var distributor = $("#change_dist_select").val();
    console.log("Category: "+ category);
    console.log("Partname: "+ partname);
    console.log("Footprint: "+ footprint);
    console.log("description: "+ description);
    console.log("location: "+ location);
    console.log("quantity: "+ quantity);
    console.log("Manufacturer: "+ manufacturer);
    console.log("datasheet: "+ datasheet);
    console.log("Distributor: "+ distributor);
    console.log("ID: " + id);
    if(partname.length >0)
    {
        if($.isNumeric(quantity))
        {
            var jsondata = {};
            jsondata["Comp_id"] = id;
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
            $.post( "<?php echo  base_url('data/change_component')?>", jsondata, function( data ) {
                //$( ".result" ).html( data );
                $('#Change_component_modal').modal('hide');
                UpdateTable();
                GenerateSuccess("Part Changed");
            });
            
        }
        else
        {
            $("#changecomperror").show();
            $("#changecomperror").text("Quantity is not a number");
        }
    }
    else
    {
        $("#changecomperror").show();
        $("#changecomperror").text("No partname entered");
    }    
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
                console.log($("#multipart").is(':checked'));
                if($("#multipart").is(':checked'))
                {
                    
                }
                else
                {
                    $('#Add_component_modal').modal('hide');
                }
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