 <?php
	$attributes = array('id' => 'form1' , 'name' => 'form1'); 
	//if(validation_errors() != false) { echo iconv('TIS-620', 'UTF-8', '���������١��ͧ'); }
	//foreach($query as $row){ 
?>
 <?=form_open('home/document_search/'.$key_search, $attributes)?>
<section id="main"><article class="width_full"> 
 <header>
      <h3 class="tab_name"><?php echo iconv('TIS-620', 'UTF-8', '�����͡���');?></h3>
 </header>

  <div class="module_content">
    <table width="100%" cellspacing="0" >
		
		 <tr>
            <td width="70%" class="data">Search Document&nbsp;&nbsp;&nbsp;<input id="searchbox" name="searchbox" type="text" size="30"  />&nbsp;<?=form_error('searchbox');?>&nbsp;<input name="button-submit" type="submit" id="button-submit" value="SEARCH"  /></td>
           
        </tr> 
		
		
    </table><hr>
	<?php 
	if(!empty($query)){
		?>
	 <table class="tableform">
        <thead>
			<tr>        
            <td class="center" width="10%">DocumentID</td>
            <td class="center" width="20%">DocumentName</td>
			 <td class="center" width="10%">Type</td>
            <td class="center" width="20%">Detail</td>
           <!--  <td class="center" width="8%">DivisionID</td>
			<td class="center" width="7%">FolderID</td> -->
			 <td class="center" width="15%">DateTime</td>
			 <td class="center" width="10%">By</td> 
			 <td class="center" width="15%">View Document</td>   
          </tr>
		</thead>
		<tbody>
		<?php 
		if(!empty($query)){
			foreach($query as $row){ 
				//$row['doc_path'] = str_replace($row['doc_path'],'/','\\');
				$arr = explode("/", $row['doc_path']);
				$n=count($arr);
				$file = $arr[$n-2].'/'.$arr[$n-1];
				$file = base_url().'folder_data/'.$file
				//echo $arr[$n-1];
				?>
				<tr> 
				<td class="center"><?=$row['doc_id'];?></td>
				<td class="center"><?=$row['doc_name'];?></td>
				<td class="center"><?=$row['doc_type'];?></td>
				<td class="center"><?=$row['doc_detail'];?></td>
			<!-- 	<td class="center"><?=$row['division_id'];?></td>	
			    <td class="center"><?=$row['folder_id'];?></td> -->
				<td class="center"><?=$row['timestamp'];?></td>
				<td class="center"><?=$row['create_document'];?></td>
				
				<td class="center"><!--[ <a href='#' onclick='ViewInfo("<?=$row['user_name']?>");'>View</a> ]-->[<a href='<?=$file;?>' class="btn" target="_blank">View Document</a>]<!--[ <a href='#' onclick='DelInfo("<?=$row['user_name']?>");'>Delete</a> ]-->
				  </td>
			  </tr>
			<?php 
			} 	}		
			?>
		</tbody>
	  </table>
	  <?php
	} 
			?>
	<!--  <div class="pagination"><div class="results"><?php echo $this->pagination->create_links(); ?></div></div> --><div><br />
			<?php if($this->session->flashdata('message')) : ?>
		<p><?=$this->session->flashdata('message')?></p>
		<?php endif; ?>
		</div>
</div>


</article></section> <?=form_close();?> 
<?php
//}

?> 
<script type="text/javascript">
$(document).ready(function() {
	$(function() {
		
		var str='<?php echo $suggestions;?>';
		var n=str.split("|");
		
		$( "#searchbox" ).autocomplete({
		 source: n
		});
	   
	   $('.ui-autocomplete.ui-menu').css('fontSize', '12px');
	});


});

</script>