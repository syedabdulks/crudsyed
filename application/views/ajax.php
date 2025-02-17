<div id="demo">
    <h2>Let Ajax change this text</h2>
    <button type="button">Change Content</button>
</div>

<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $("button").click(function() {
    $.ajax({url: "settings", success: function(result){
        $("#demo").html(result);
    }});
});

</script>