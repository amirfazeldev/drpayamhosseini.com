<?
function cat_config($table='',$title='',$parent,$desc=false)
{
	$parent1 = intval(@$_REQUEST['parent']);
	$parent0 = $parent1;
	while($parent0>0){
		$parent_status = " <a href='./?page=admin&component=".$_REQUEST['component']."&t=".$_REQUEST['t']."&parent=$parent0' >» ".table('cat',$parent0,'name')."</a>".@$parent_status;
		$parent0 = table("cat",$parent0,'parent');
	}
	switch (@$_REQUEST['do']) {
		
		case 'movedown':
			cat_management_ordmove($_REQUEST['id'] , "+");
			break;

		case 'moveup':
			cat_management_ordmove($_REQUEST['id'] , "-");
			break;

		case 'saveNew' : 
			cat_management_saveNew();
			break;
			
		case 'saveEdit' : 
			cat_management_saveEdit();
			break;

		case 'remove' :
			cat_management_remove();
			break;

		case 'flag' :
			toggl_flag("cat");
			break;	
		
	}
?>
<div class="do_admin">
	<div class="admin-hed">
          <h2><?=$title?></h2>            
    </div>
    <div class="listmaker_tabmenu_line"></div>
    <div class="tabmenu_setting">
		<div class="cat-dashboard">
			<div id="cat_form_management">
				<div class=title ><a href='./?page=admin&component=<?=$table?>_cat&t=<?=$table?>'>» <?=$title?></a><?=@$parent_status?>
				</div>
				<div id="cat_management">
					<?
					if(! $rs = dbq(" SELECT * FROM `cat` WHERE `cat`='$table' AND `parent`='$parent1' ORDER BY `prio` ASC ") ){
						e( __FUNCTION__, __LINE__, dbe() );
					
					} else if(! dbn($rs) ){
						?><div class="convbox">هنوز موردی ثبت نشده است</div><?

					} else while( $rw = dbf($rs) ){
					?>
					<div class="record  itgc_grid2">
						<form enctype="multipart/form-data" method="post" action="./?page=admin&component=<?=$table?>_cat&t=<?=$table?>&parent=<?=@$_REQUEST['parent']?>&id=<?=$rw['id'];?>&do=saveEdit">				
							<a class="remove" onclick="if(!confirm(&quot;آیا مایل به حذف هستید؟&quot;))return false;" href="<?=_URL?>/?page=admin&component=<?=$table?>_cat&t=<?=$table?>&parent=<?=@$_REQUEST['parent']?>&do=remove&id=<?=$rw['id'];?>"tooltip-title="حذف"></a>
							
							<a class="move-up" href="<?=_URL?>/?page=admin&component=<?=$table?>_cat&t=<?=$table?>&parent=<?=@$_REQUEST['parent']?>&do=moveup&id=<?=$rw['id'];?>"tooltip-title="انتقال به بالا"></a>

							<a class="move-down" href="<?=_URL?>/?page=admin&component=<?=$table?>_cat&t=<?=$table?>&parent=<?=@$_REQUEST['parent']?>&do=movedown&id=<?=$rw['id'];?>"tooltip-title="انتقال به پایین"></a>
							
							<input placeholder="عنوان" type="text" name="name" value="<?=$rw['name'];?>">

							<input placeholder="نام لاتین" type="text" name="slug" value="<?=$rw['slug'];?>">
							<? if($desc){ ?>
							<input placeholder="وضیحات" type="text" name="desc" value="<?=$rw['desc'];?>">		
							<?}?>
							<input type="submit" class="submit_button subanchor" value="ویرایش">
							<?
							if ($parent) {
								?><a class="submit_button subanchor" href="<?=_URL?>/?page=admin&component=<?=$table?>_cat&t=<?=$table?>&parent=<?=$rw['id'];?>">زیردسته</a><?
							}
							?>
							<a class="flag" href="<?=_URL?>/?page=admin&component=<?=$table?>_cat&t=<?=$table?>&parent=<?=@$_REQUEST['parent']?>&do=flag&flag=<?=$rw['id'];?>"tooltip-title="فعال/غیر فعال"></a>

						</form>	
					</div>
					<?}?>
					<div id="new" class="itgc_grid2">
						<form enctype="multipart/form-data" method="post" action="./?page=admin&component=<?=$table?>_cat&t=<?=$table?>&parent=<?=@$_REQUEST['parent']?>&do=saveNew">
						
							<input placeholder="عنوان" type="text" name="name" value="" id="newName" style="">

							<input placeholder="نام لاتین" type="text" name="slug" value="">

							<? if($desc){ ?>
							<input placeholder="توضیحات" type="text" name="desc" value="" id="newDesc" style="">
							<?}?>
							<input type="submit" class="submit_button subanchor" value="ثبت">
						</form>
					</div>
					<script>document.getElementById('newName').focus();</script>
				</div>
			</div>
		</div>
	</div>
</div>	
<?
}