<html>
    <head>
        <title>Code igniter dynamic dependent select box using Ajax</title>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
.box {
    width: 100%;
    max-width: 650px;
    margin: 0 auto;
}
</style>
</head>
<body>
    <div class="container box">
        <br />
        <br />
        <h3 align = "center">CodeIgniter Cascading Select Using Ajax</h3>
<br />

<div class="form-group">
<select name="country" id="country" class="form-control input-lg">
<option value="">Select Country</option>   
<?php foreach($countries as $country){?> 
    <option value="<?=$country->country_id?>"><?=$country->country_name?></option>
<?php } ?>
</select>
</div>

<br />
<div class="form-group">
    <select name="state" id="state" class="form-control input-lg">
        <option value="">Select State</option>
    </select>
</div>
<br />

<div class="form-group">
<select name="city" id="city" class="form-control input-lg">
<option value="">Select City</option>
</select>
</div>

</div>
</body>
</html>
<script>
$(document).ready(function(){
  $("#country").change(function () {
    var country_id = $(this).val();
    if(country_id!="") {
        $.ajax ({
            url: "<?=base_url('select/states')?>",
            method: "get",
            data: {country_id:country_id},
            success: function(data){
                $('#state').html(data);
                $('#city').html(' <option value="">Select city</option>');
            }
        });
    }else {
        $('#state').html('<option value="">Select state</option>');
        $('#city').html(' <option value="">Select city</option>');
    }
  });
});
$("#state").change(function () {
    var state_id = $(this).val();
    if(state_id!="") {
        $.ajax ({
            url: "<?=base_url('select/cities')?>",
            method: "get",
            data: {state_id:state_id},
            success: function(data){
                $('#city').html(data);
            }
        });
    }else {
        $('#city').html(' <option value="">Select city</option>');
    }
});

</script>
