 <script>
$(document).ready(function(){
$("#player-x").blur(function()
 {
	var name = $(this).val();  //getting the input value for player_x and sending dynamic with ajax, post method with variable named player_x
	$.ajax({
    url:"includes/checkName.php",
    method:"POST",
    data:{player_x:name},
    dataType:"text",
    success:function(data)
    {
		$('#available_player_x').html(data);
    }
   });
 });
});
</script>

 <script>
$(document).ready(function(){
$("#player-o").blur(function()
 {
	var name = $(this).val();
	$.ajax({
    url:"includes/checkName.php",
    method:"POST",
    data:{player_o:name},
    dataType:"text",
    success:function(data)
    {
		$('#available_player_o').html(data);
    }
   });
 });
});
</script>