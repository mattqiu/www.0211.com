<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 商品列表 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/Styles/main.css" rel="stylesheet" type="text/css" />
<script src="/Public/umeditor/third-party/jquery.min.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo $_page_btn_link; ?>"><?php echo $_page_btn_name; ?></a></span>
    <span class="action-span1"><a href="__GROUP__">管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo $_page_title; ?> </span>
    <div style="clear:both"></div>
</h1>

<!--内容-->
<!--引入布局-->

<style>
#ul_pic_list li{list-style-type:none;}
#old_pic_list li{list-style-type:none; float:left; margin:5px}
</style>
<div class="tab-div">
    <div id="tabbar-div">
        <p>
            <span class="tab-front" id="general-tab">通用信息</span>
            <span class="tab-back" id="general-tab">商品描述</span>
            <span class="tab-back" id="general-tab">会员价格</span>
            <span class="tab-back" id="general-tab">商品属性</span>
            <span class="tab-back" id="general-tab">商品相册</span>
        </p>
    </div>
    <div id="tabbody-div">
        <form enctype="multipart/form-data" action="/index.php/Admin/Goods/add.html" method="post">
<!--基本信息-->
            <table width="90%" class="tab_table" align="center">
            	<tr>
                    <td class="label">主分类：</td>
                    <td>
	                	<select name="cat_id">
							<option value="">请选择</option>
						<?php foreach ($tree as $k=>$v): ?>
							<option value="<?php echo $v['id']?>"><?php echo str_repeat('-' , 8*$v['level']) . $v['cat_name']?></option>
						<?php endforeach;?>
						</select>
						<span class="require-field">*</span>
                    </td>
                </tr>
               	<tr>
                    <td class="label">扩展分类：</td>
                    <td	id="cat_list">
	                	<select name="ext_cat_id[]" style="margin:0 5px 5px 0;">
							<option value="">请选择</option>
						<?php foreach ($tree as $k=>$v): ?>
							<option value="<?php echo $v['id']?>"><?php echo str_repeat('-' , 8*$v['level']) . $v['cat_name']?></option>
						<?php endforeach;?>
						</select>
					<input id="btn_add_cat" type="button" value="添加一个扩展分类"/>
                    </td>
                </tr>
            	<tr>
                    <td class="label">商品品牌：</td>
                    <td>
                    	<?php buildSelect('brand','brand_id','id','brand_name');?>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品名称：</td>
                    <td><input type="text" name="goods_name" value=""size="30" />
                    <span class="require-field">*</span></td>
                </tr>	                
                <tr>
                    <td class="label">市场售价：</td>
                    <td>
                        <input type="text" name="market_price" value="0" size="20"/>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">本店售价：</td>
                    <td>
                        <input type="text" name="shop_price" value="0" size="20"/>
                        <span class="require-field">*</span>
                    </td>
                </tr>  
                <tr>
                    <td class="label">上架：</td>
                    <td>
                        <input type="radio" name="is_onsale" value="1" checked='checked'/> 是
                        <input type="radio" name="is_onsale" value="0"/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">商品图片：</td>
                    <td>
                        <input type="file" name="logo" size="60" />
                    </td>
                </tr>	                
                <tr>
                    <td class="label">促销价格：</td>
                    <td>
                        <input type="text" name="promote_price" value="0" size="20"/>
                    </td>
                </tr>	                
                <tr>
                    <td class="label">促销开始时间：</td>
                    <td>
                        <input id="promote_start_date" type="text" name="promote_start_date" value="<?php echo date('Y-m-d H:i:s');?>" size="20"/>　到　
                        <input id="promote_end_date" type="text" name="promote_end_date" value="<?php echo date('Y-m-d H:i:s');?>" size="20"/>
                    </td>
                </tr> 
                <tr>
                    <td class="label">新品：</td>
                    <td>
                        <input type="radio" name="is_new" value="是"/> 是
                        <input type="radio" name="is_new" value="否" checked='checked'/> 否
                    </td>
                </tr> 
                <tr>
                    <td class="label">精品：</td>
                    <td>
                        <input type="radio" name="is_best" value="是"/> 是
                        <input type="radio" name="is_best" value="否" checked='checked'/> 否
                    </td>
                </tr> 
                <tr>
                    <td class="label">热卖：</td>
                    <td>
                        <input type="radio" name="is_hot" value="是"/> 是
                        <input type="radio" name="is_hot" value="否" checked='checked'/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">推荐楼层：</td>
                    <td>
                        <input type="radio" name="is_floor" value="是"/> 是
                        <input type="radio" name="is_floor" value="否" checked='checked'/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">排序：</td>
                    <td>
                        <input type="text" name="sort_num" value="100"/>
                        <span class="require-field">*整数1-255之间</span>
                    </td>
                </tr>	  	                
               
            </table>
<!--商品描述-->
            <table style="display:none;" width="100%" class="tab_table" align="center">
                <tr>
                    <td>
                        <textarea id="goods_desc" name="goods_desc"></textarea>
                    </td>
                </tr>
            </table>
<!--会员价格-->
            <table style="display:none;" width="90%" class="tab_table" align="center">
                    <?php foreach ($mlData as $k=>$v):?>
                    <?php echo '<tr><td class="label">'.$v['level_name'].'：</td>';?>
                    <td><input type="text" size="8" name="member_price[<?php echo $v['id']?>]"/></td></tr>
                    <!--input传递多个数据时name数组形式:名称[id-->
					<?php endforeach;?>                        
            </table>
<!--商品属性-->
            <table style="display:none;" width="90%" class="tab_table" align="center">
            <tr>	
      	 		<td class="label">商品类型：</td>
            	<td>
            		<?php buildSelect('type' , 'type_id' , 'id' , 'type_name');?>
            	</td>
            </tr>
            <tr>
            	<td></td>
            	<td><ul id="attr_list"></ul></td>
            </tr>
            </table>
<!--商品相册-->
            <table style="display:none;" width="90%" class="tab_table" align="center">
			<tr>
				<td>	
					<ul id="ul_pic_list">
					<input type="file" name="pic[]" />
					<input id="btn_add_pic" type="button" value="点击添加一张"/>
					</ul>
				</td>      
            </table>
            <div class="button-div">
                <input type="submit" value=" 确定 " class="button"/>
                <input type="reset" value=" 重置 " class="button" />
            </div>
        </form>
    </div>
</div>


<!-- 1时间插件 -->
<script src="/Public/umeditor/third-party/jquery.min.js"></script>
<link href="/Public/datetimepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/datetimepicker/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/datetimepicker/datepicker-zh_cn.js"></script>
<link rel="stylesheet" media="all" type="text/css" href="/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.css" />
<script type="text/javascript" src="/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.js"></script>
<script type="text/javascript" src="/Public/datetimepicker/time/i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>
<script>
//设置中文
$.timepicker.setDefaults($.timepicker.regional['zh-CN']);
//设置格式,显示时分
$("#promote_start_date").datetimepicker();
$("#promote_end_date").datetimepicker();
</script>

<!--2导入在线编辑器-->
<link href="/Public/umeditor/themes/default/css/umeditor.min.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="/Public/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor/umeditor.min.js"></script>
<script type="text/javascript" src="/Public/umeditor/lang/zh-cn/zh-cn.js"></script>
<!--//设置UEditor的宽高-->
<script>
UM.getEditor('goods_desc' , {
	initialFrameWidth :'100%',
	initialFrameHeight :350			
})

//切换的代码
$('#tabbar-div p span').click(function()
{	//点击第几个按钮
	var i = $(this).index();
	//先隐藏所有的table
	$('.tab_table').hide();
	//显示第i个table
	$('.tab_table').eq(i).show();
	//先取消原按钮的选中状态
	$('.tab-front').removeClass('tab-front').addClass('tab-back');
	//设置当前按钮选中
	$(this).removeClass('tab-back').addClass('tab-front');
});

//商品相册-添加一张
$('#btn_add_pic').click(function(){
	var file = '<li><input type="file" name="pic[]" /></li>';
	$('#ul_pic_list').prepend(file);
});

//添加一个扩展分类下拉框
$('#btn_add_cat').click(function(){
	var newSel = $('#cat_list').find('select').eq(0).clone();
	$('#btn_add_cat').before(newSel);
});

/************选择类型获取属性AJAX************/
$("select[name=type_id]").change(function(){
	//获得当前选中的类型的id
	var typeId = $(this).val();
	//如果选择了一个类型就执行AJAX取属性
	if(typeId > 0)
	{
		$.ajax({
			type:'GET',
			url:"<?php echo U('ajaxGetAttr' , '' , FALSE);?>/type_id/"+typeId,
			dataType:'json',
			success:function(data)
			{
				var li = '';
				$(data).each(function(k,v)
				{
					li += '<li>';
					//如果这个属性类型是可选就有+
					if(v.attr_type == '可选')
						li += '<a onclick="addNewAttr(this);" href="#">[+]</a>';
					li += v.attr_name + ' : ';
					if(v.attr_option_values == '')
						li += '<input type="text" name="attr_value['+v.id+'][]"/>';
					else
					{
						li += '<select name="attr_value['+v.id+'][]"><option value="">请选择...</option>';
						var _attr = v.attr_option_values.split(',');
						for(var i=0; i<_attr.length;i++)
						{
							li += '<option value="'+_attr[i]+'">';
							li += _attr[i];
							li += '</option>';
						}
						li += '</select>';
					}
					li += '</li>';
				});
				$('#attr_list').html(li);
			}
		});
	}
	else
		$('#attr_list').html("");
});

//点击+
function addNewAttr(a)
{
	//$(a)将形参转换为jquery对象	
	var li = $(a).parent();
	if($(a).text() == '[+]')
	{
		var newLi = li.clone();
		newLi.find('a').text('[-]');
		li.after(newLi);
	}
	else
		li.remove();
}

</script>




<div id="footer">
版权所有 &copy; 2016-2017 ****网络科技有限公司，并保留所有权利。</div>
</body>
</html>