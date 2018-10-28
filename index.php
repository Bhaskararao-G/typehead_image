<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Autocomplete Textbox using Bootstrap Typehead with Ajax PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
 </head>
 <style>
   .typeahead_image {
     width: 20px;
     height: 20px;
     margin-right: 5%;
   }
   .typeahead_item {
    display: flex;
   }
 </style>
 <body>
  <br /><br />
  <div class="container" style="width:600px;">
   <h2 align="center">Autocomplete Textbox using Bootstrap Typeahead with Ajax PHP</h2>
   <br /><br />
   <label>Search Country</label>
    <div class="input-group">
      <input type="text" id="country" class="form-control" placeholder="Search">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit">
          <i class="glyphicon glyphicon-search"></i>
        </button>
      </div>
    </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 var countries = [];

 $("#country").typeahead({
    source: function (query, result) {
      $.ajax({
        url:"search.php",
        method:"POST",
        data:{ query:query },
        dataType:"json",
        success:function(data)
        {
          countries = data;
          result($.map(data, function(item){
            return item;
          }));
        }
      })
    },
    highlighter: function (item) {
      index = countries.findIndex(x => x.name == item);
        var test = countries[index];
        return '<div class="typeahead_item">' + '<img class="typeahead_image" src="images/' + test.image + '" />' + '<br/><span>' + test.name + '</span>' + '</div>';
    },
    updater: function (selectedName) {

        //redirecting to the hyperlink
        location.replace(selectedName.url);

        //return the string you want to go into the textbox (the name)
        return selectedName;
    }
});
 
});
</script>