 <?php
	$attributes = array( 'id' => 'form' , 'name' => 'form' ); 
	//echo validation_errors();
	//foreach($query as $row){    ,'enctype'=>'multipart/form-data'
?>

	  <section id="main"><article class="width_full"> 
 <header>
      <h3 class="tab_name">DELETE DIVISION</h3>
         
 </header>
	<div  class="module_content">
		  <?=form_open('home/division_delete', $attributes)?>
      <table class="tableform">
        <thead>
			<tr>        
            <td class="center" width="15%">Division ID</td>
            <td class="center" width="20%">Name</td>
            <td class="center" width="50%">Detail</td>  
			<td class="center" width="10%">Action</td>  
          </tr>
		</thead>
		<tbody>
		<?php 
		if(!empty($query)){
			foreach($query as $row){ 
			?>
			<tr> 
            <td class="center"><?=$row['division_id'];?></td>
            <td class="center"><?=$row['division_name'];?></td>
            <td class="center"><?=$row['division_detail'];?></td>
			
            <td class="center">[<a href='#' class="btn" onclick='DelInfo("<?=$row['division_id']?>");'>Delete</a>]
              </td>
          </tr>
		<?php 
		} 	}
			?>
		</tbody>
	  </table>
        <?=form_close();?> 
		<div class="pagination"><div class="results"><?php echo $this->pagination->create_links(); ?></div></div>
		<div><br />
			<?php if($this->session->flashdata('message')) : ?>
		<p><?=$this->session->flashdata('message')?></p>
		<?php endif; ?>
		</div>
	</div>

</article></section>

<script>

function DelInfo(id){
	if(confirm('<? echo iconv("TIS-620", "UTF-8", "��ͧ���ź?");?>')){
		window.location='<? echo base_url();?>'+'index.php/home/division_delete/'+id;
	}
	else{
		return false;
	}	
}
</script>



