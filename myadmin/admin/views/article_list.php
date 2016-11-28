<?php $this->load->view('header');?>
<div class="contents">
<h1>文章管理-(共<?php echo $article_nums;?>条) <a class="tips" data-content="添加文章"  href="<?php echo site_url('article/create')?>"><i class="iconfont">&#xe67d;</i></a>
<?php echo form_open('article/search')?>
  <select name="cid">
  <option value="0"> 选择栏目 </option>
<?php foreach($categoryes as $item):?>
<option <?php echo set_select('cid',$item['cid']);?> value="<?php echo $item['cid']?>"><?php echo $item['cname']?></option>
<?php endforeach;?>
</select>
<?php echo form_input('title',set_value('title'))?>
<?php echo form_submit('search','查询');?>
<?php echo form_close();?>

</h1>
 <div class="article">
 <?php echo form_open('article/batch_operation ');?>
   <table class="table">
   <thead>
      <tr>
	   <th><input type="checkbox" onclick="setC()" id="deletec" name="deletec"></th>
	   <th>ID</th>
	     <th class="wp75">文章标题</th>
		 <th>发布时间</th>
		 <th>所属栏目</th>
		 <th>操作</th>
	  </tr>
   </thead>
   
<tbody>
   <?php foreach ($article as $item): ?>
     <tr>
	  <td class="set"><input type="checkbox" class="deletec"  name="id[]" value="<?php echo $item['id']; ?>" > </td>
	 <td><?php echo $item['id']; ?> </td>
	 <td><a class="tags" data-content="<b>简述:</b><?php echo $item['description']; ?>" href="<?php echo base_url('index.php/article/detail/'.$item['id']);?>" target="_banlk"><?php echo $item['title']; ?></a> </td>
	 <td class="set"><?php echo $item['create_date'];?></td>
	 <td class="set"><?php echo $item['cname'];?></td>
	 <td class="set">
	 <a class="tips" data-content="编辑"  href="<?php echo site_url('article/edit/'.$item['id'])?>"><i class="iconfont edit">&#xe601;</i></a>|
	 <a class="tips" data-content="删除" href="<?php echo site_url('article/delete/'.$item['id'])?>"><i class="iconfont">&#xe636;</i></a></td>
	 </tr>
  <?php endforeach; ?>
   </tbody>
   </tfoot>
   <tr>
 <td  colspan="6">
<input type="submit" class="on" value="批量删除" name="submit" disabled="disabled">
 批量移动至
  <select name="cid">
  <option value="0"> ---- </option>
<?php foreach($categoryes as $item):?>
<option value="<?php echo $item['cid']?>"><?php echo $item['cname']?></option>
<?php endforeach;?>
</select>

<input type="submit" class="on" value="批量移动" name="submit_move" disabled="disabled">
    <?php echo $this->pagination->create_links();?>
 </td>

</tr>
   </tfoot>

   </table>
   <?php echo form_close();?>

 </div>

</div>
<script type="text/javascript">


$(document).ready(function(){
  $(".deletec").click(function(){
    if($("input:checkbox[name='id[]']:checked").length > 0){//至少有一个复选框选中
			$("input[name='submit']").attr("disabled",false).removeClass('on');
		$("input[name='submit_move']").attr("disabled",false).removeClass('on');	
	} else {
		$("input[name='submit']").attr("disabled",true).addClass('on');
		$("input[name='submit_move']").attr("disabled",true).addClass('on');
	}
  });
});

function setC() {
	if($("#deletec").attr('checked')) {
		$(".deletec").attr("checked",true);
		$("input[name='submit']").attr("disabled",false).removeClass('on');
		$("input[name='submit_move']").attr("disabled",false).removeClass('on');

	} else {
		$(".deletec").attr("checked",false);
		$("input[name='submit']").attr("disabled",true).addClass('on');
		$("input[name='submit_move']").attr("disabled",true).addClass('on');
	}
}





</script>

<?php $this->load->view('footer');?>