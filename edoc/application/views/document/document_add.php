 <?php
	$attributes = array('id' => 'form1' , 'name' => 'form1', 'enctype'=>'multipart/form-data'); 
	if(validation_errors() != false) { echo iconv('TIS-620', 'UTF-8', '<font color="red">���������١��ͧ</font>'); }
	//foreach($query as $row){ 
	if(empty($runid)){$doc_id = '0000000001';}
	else{ $doc_id = $runid;}
?>
 <?=form_open('home/document_add/', $attributes)?>
<section id="main"><article class="width_full"> 
 <header>
      <h3 class="tab_name"><?php echo iconv('TIS-620', 'UTF-8', 'ŧ����¹�͡���');?></h3>
           <!--  <h3 class="tab_manage"><a href="#">Edit</a></h3> -->
 </header>

  <div class="module_content">
    <table width="100%" cellspacing="0" class="tableform">
		<tr>
            <td width="20%"><font color="red">* Required<?=form_hidden('create_document',$user_fname.' '.$user_lname);?></font></td></tr>
		 <tr>
            <td width="20%" class="mandatory">Document ID</td>
            <td width="80%" class="data"><?=form_input('doc_id',$doc_id);?>&nbsp;<?=form_error('doc_id');?></td>
        </tr> 
		<tr>
             <td width="20%" class="mandatory">Document Name</td>
            <td width="80%" class="data"><?=form_input('doc_name');?>&nbsp;<?=form_error('doc_name');?></td>
        </tr>
		<tr>
             <td width="20%" class="mandatory">Document Type</td>
            <td width="80%" class="data"><?=form_input('doc_type');?>&nbsp;<?=form_error('doc_type');?></td>
        </tr>
		<tr><?php
			$input = array ( "name"=>"doc_detail","id"=>"doc_detail", "size"=>"40" );
		?>
             <td width="20%" class="mandatory">Document Detail</td>
            <td width="80%" class="data"><?=form_input($input);?>&nbsp;<?=form_error('doc_detail');?></td>
        </tr>
		
		<tr>
            <td width="20%" class="mandatory">Division ID</td>			
            <td width="80%" class="data"><?=form_dropdown('division_id',$dvlist);?>&nbsp;<?=form_error('division_id');?></td>				
        </tr>
		<tr>
            <td width="20%" class="mandatory">Folder ID</td>			
            <td width="80%" class="data"><?=form_dropdown('folder_id',$fldlist);?>&nbsp;<?=form_error('folder_id');?></td>				
        </tr>
		
		<tr>
            <td width="20%" class="mandatory">Upload Document</td>
            <td width="80%" class="data"> <input name="userfile" id="userfile" type="file" size="20"/>&nbsp;</td>
        </tr>
		 <tr>
                <td>&nbsp;</td>
                <td>
                <input name="button-submit" type="submit" id="button-submit" value="SUBMIT"  />
                <input name="button-cancel" type="button" id="button-cancel" value="RESET" onclick="reset();" />  
                </td>
                </tr>
    </table>
	
	 <div class="pagination"><div class="results"><?php echo $this->pagination->create_links(); ?></div></div><div><br />
			<?php if($this->session->flashdata('message')) : ?>
		<p><?=$this->session->flashdata('message')?></p>
		<?php endif; ?>
		</div>
</div>


</article></section> <?=form_close();?> 
<?php
//}

?> 
<script>

function AddInfo(id){
	window.location='<? echo base_url();?>'+'index.php/home/document_add/'+id;
}

</script>