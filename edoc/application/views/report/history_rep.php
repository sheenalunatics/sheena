 <?php
	$attributes = array('id' => 'form1' , 'name' => 'form1'); 
	//if(validation_errors() != false) { echo iconv('TIS-620', 'UTF-8', '���������١��ͧ'); }
	//foreach($query as $row){ 

		//echo date('Y-m-d 23:59:59', strtotime('1/31/2013'));;
?>
 <?=form_open('home/history_rep/', $attributes)?>
<section id="main"><article class="width_full"> 
 <header>
      <h3 class="tab_name"><?php echo iconv('TIS-620', 'UTF-8', '������§ҹ������ҧ');?></h3>
	 
 </header>

  <div class="module_content">
    <table width="100%" cellspacing="0" >
		
		 <tr>
            <td width="70%" class="data">
					<?php echo iconv('TIS-620', 'UTF-8', '���͡��ǧ�ѹ���');?>&nbsp;
					<input name="from-datepicker" type="text" id="from-datepicker"/>			
					<input name="to-datepicker" type="text" id="to-datepicker" />&nbsp;
					<?php echo iconv('TIS-620', 'UTF-8', '�����ҹ');?>&nbsp;
					<?=form_dropdown('userid_list',$userlist);?>&nbsp;
					<?php echo iconv('TIS-620', 'UTF-8', '��§ҹ');?>&nbsp;
					<?=form_dropdown('divisionid_list',$dvlist);?>&nbsp;
					<input name="button-submit" type="submit" id="button-submit" value="SEARCH"  />
			</td>
           
        </tr> 
		
		
    </table><hr>
	<?php 
	if(!empty($query)){
		?>
	 <table class="tableform">
        <thead>
			<tr>        
            <td class="center" width="30%">Datetime</td>
           <!--  <td class="center" width="20%">DocumentID</td>
			 <td class="center" width="10%">FolderID</td> -->
            <td class="center" width="20%">DivisionID</td>
			 <td class="center" width="20%">UserID</td>
			 <td class="center" width="30%">Detail</td>
          </tr>
		</thead>
		<tbody>
		<?php 
		if(!empty($query)){
			foreach($query as $row){ 
				
				?>
				<tr> 				
				<td class="center"><?=$row['doc_log'];?></td>
				<!-- <td class="center"><?=$row['doc_id'];?></td>
				<td class="center"><?=$row['folder_id'];?></td> -->
				<td class="center"><?=$row['division_id'];?></td>
				<td class="center"><?=$row['user_action'];?></td>
				<td class="center"><?=$row['report_detail'];?></td>
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
		
	/*	var str='<?php echo $suggestions;?>';
		var n=str.split("|");
		
		$( "#searchbox" ).autocomplete({
		 source: n
		});
	   
	   $('.ui-autocomplete.ui-menu').css('fontSize', '12px');

	   */
		
		$( "#from-datepicker" ).datepicker();
		$( "#to-datepicker" ).datepicker();

	});


});

</script>