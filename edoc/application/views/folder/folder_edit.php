 <?php
	$attributes = array('id' => 'form1' , 'name' => 'form1' ); 
	
	if(validation_errors() != false) { echo iconv('TIS-620', 'UTF-8', '<font color="red">���������١��ͧ</font>'); }
	foreach($query as $row){ 
?>
 <?=form_open('home/folder_edit/'.$row['folder_id'], $attributes)?>
<section id="main"><article class="width_full"> 
 <header>
      <h3 class="tab_name">EDIT FOLDER</h3>
           <!--  <h3 class="tab_manage"><a href="#">Edit</a></h3> -->
 </header>

  <div class="module_content">
    <table width="100%" cellspacing="0" class="tableform">
		<tr>
            <td width="20%"><font color="red">* Required<?=form_hidden('create_folder',$user_fname.' '.$user_lname);?></font></td>
		</tr>
		<tr>
             <td width="20%" class="data">Folder ID</td>
            <td width="80%" class="data"><?=$row['folder_id'];?><?=form_hidden('hdfolder_id',$row['folder_id']);?>&nbsp;</td>
        </tr>
		<tr>
             <td width="20%" class="mandatory">Folder Name</td>
            <td width="80%" class="data"><?=form_input('folder_name', $row['folder_name']);?>&nbsp;<?=form_error('folder_name');?></td>
        </tr>
		<tr>
            <td width="20%" class="mandatory">Division ID</td>			
            <td width="80%" class="data"><?=form_dropdown('division_id',$dvlist,$row['division_id']);?>&nbsp;<?=form_error('division_id');?></td>	
		</tr>		
		 <tr>
                <td>&nbsp;</td>
                <td>
                <input name="button-submit" type="submit" id="button-submit" value="SUBMIT" />
                <input name="button-cancel" type="button" id="button-cancel" value="BACK" onclick="goBack();" />  
                </td>
                </tr>
    </table>
</div>


</article></section> <?=form_close();?> 
<?php
}

?> 
<script>
function goBack(){
	window.location='<? echo base_url();?>'+'index.php/home/folder_edit_view';
}
</script>