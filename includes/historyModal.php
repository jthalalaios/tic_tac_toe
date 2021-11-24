<?php 
require_once ('require.php');
$con=db_open();
$output='';
try 
{
	$sql=" select id from user where name=:name" ;  
	$query = $con->prepare($sql);    
	$query->execute(array(':name'=>$_SESSION['player_x'])); 
	$player_x_id=$query->fetchColumn(0);
}
catch(PDOException $e)
{		
	echo $sql . "<br>" . $e->getMessage();
	die();
}
try 
{
	$sql2=" select id from user where name=:name" ;  
	$query2 = $con->prepare($sql2);    
	$query2->execute(array(':name'=>$_SESSION['player_o'])); 
	$player_o_id=$query2->fetchColumn(0);
}
catch(PDOException $e)
{		
	echo $sql2 . "<br>" . $e->getMessage();
	die();
}
?>
<div class="modal fade" id="previousGame<?php echo $_SESSION['previousGame']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Previous Game:</h4></center>
            </div>
            <div class="modal-body">
                  <table class="table table-bordered table-striped">
                        <thead>
                            <th>Player</th>
                            <th>Move</th>
                        </thead>
                        <tbody>
						  <?php	
								try 
								{	
									$sql3="select * from history inner join user on history.id_user =user.id  WHERE id_user =:id_user  ";
									$query3 = $con->prepare($sql3);
									$query3->execute(array(':id_user'=>$player_x_id));
								}
								catch(PDOException $e)
								{	
									echo $sql3 . "<br>" . $e->getMessage();
									die();
								}
								foreach ($query3->fetchAll() as $row) 
								{
									//var_dump($row);
									$output='
									<td>'.$_SESSION['player_x'].'</td>
									<td>'.$row['move'].'</td>
									';
								}
								$output = '';								
                                try 
								{	
									$sql4="select * from history inner join user on history.id_user =user.id WHERE game_number=:game_number ";
									$query4 = $con->prepare($sql4);
									$query4->execute(array(':game_number'=>$_SESSION['gameNumber']));
								}
								catch(PDOException $e)
								{	
									echo $sql4 . "<br>" . $e->getMessage();
									die();
								}
								foreach ($query4->fetchAll() as $row2) 
								{
									$output='
									<td>'.$_SESSION['player_o'].'</td>
									<td>'.$row2['move'].'</td>
									';
								}
								$output .= '
								</tbody>
								';	
								echo $output;
								?>
						</table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
            </div>
        </div>
    </div>
</div>