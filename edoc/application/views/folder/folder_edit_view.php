 <?php
	$attributes = array( 'id' => 'form' , 'name' => 'form' ); 
?>

	  <section id="main"><article class="width_full"> 
 <header>
      <h3 class="tab_name">EDIT FOLDER</h3>
 </header>
	<div  class="module_content">
		  <?=form_open('home/folder_edit', $attributes)?>
      <table class="tableform">
        <thead>
			<tr>        
            <td class="center" width="10%">FolderID</td>
            <td class="center" width="30%">FolderName</td>
            <td class="center" width="10%">DivisionID</td>
			 <td class="center" width="20%">DateTime</td>
			   <td class="center" width="20%">By</td> 
			  <td class="center" width="10%"> Action</td>   
          </tr>
		</thead>
		<tbody>
		<?php 
		if(!empty($query)){
			foreach($query as $row){ 
			?>
				<tr> 
				<td class="center"><?=$row['folder_id'];?></td>
				<td class="center"><?=$row['folder_name'];?></td>
				<td class="center"><?=$row['division_id'];?></td>
				<td class="center"><?=$row['timestamp'];?></td>
				<td class="center"><?=$row['create_folder'];?></td>				
				<td class="center">[
				<?php
				if($row['action']=='delete'){	
						echo '<font color="red">Edit</font>';
				}
				else{
			?><a href='#' class="btn" onclick='EditInfo("<?=$row['folder_id'];?>");'>Edit</a>
				<?php
				}
				?>
			   ]</td>
			  </tr>
			<?php 
			} 		}	
			?>
		</tbody>
	  </table>
        <?=form_close();?> 
		 <div class="pagination"><div class="results"><?php echo $this->pagination->create_links(); ?></div></div> <div><br />
			<?php if($this->session->flashdata('message')) : ?>
		<p><?=$this->session->flashdata('message')?></p>
		<?php endif; ?>
		</div>
	</div>
</article></section>
<?php

function dateconvertTH($Date){
	if($Date=="0000-00-00 00:00:00")return;
	$ExpDate=explode("-",$Date);
	switch($ExpDate[1]):
		case "01": $Month="January"; break;
		case "02": $Month="February"; break;
		case "03": $Month="March"; break;
		case "04": $Month="April"; break;
		case "05": $Month="May"; break;
		case "06": $Month="June"; break;
		case "07": $Month="July"; break;
		case "08": $Month="August"; break;
		case "09": $Month="September"; break;
		case "10": $Month="October"; break;
		case "11": $Month="November"; break;
		case "12": $Month="December"; break;
	endswitch;
	$NewDate=$ExpDate[2][0]."".$ExpDate[2][1]." ".$Month." ".($ExpDate[0]);
	return $NewDate;
}

?>
<script>
function EditInfo(id){
	window.location='<? echo base_url();?>'+'index.php/home/folder_edit/'+id;
}
</script>



