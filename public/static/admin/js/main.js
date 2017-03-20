layui.config({
  base: scope.static+'/js/module/' //假设这是test.js所在的目录
}).extend({ //设定模块别名
  dialog: 'dialog', //如果test.js是在根目录，也可以不用设定别名
  load:'load'
});


layui.use(['layer', 'form','element','jquery','dialog'], function(){
	var layer 	= layui.layer;
	var element = layui.element();
	var form    =layui.form();
	var $=layui.jquery;
	var dialog = layui.dialog;
	var hideBtn=$('#hideBtn');
	var mainLayout=$('#main-layout');
	//监听导航点击
	element.on('nav(leftNav)', function(elem){
		var navA=$(elem).find('a');
		var id=navA.attr('data-id');
		var url=navA.attr('data-url');
		var text=navA.attr('data-text');
		
		var isActive=$('.main-layout-tab .layui-tab-title').find("li[lay-id="+id+"]");
		if(isActive.length>0){
			//切换到选项卡
			element.tabChange('tab', id);
			return;
		}else{
			var index = layer.load(2);
			//ajax 获取内容 创建tab
			$.ajax({
				type:"get",
				url:url,
				success:function(data){
					setTimeout(function(){
						layer.close(index);
						element.tabAdd('tab', {
						  title: text,
						  content: data,
						  id: id
						});  
						element.tabChange('tab', id);
						form.render();
					},1000);
					
				}
			});
			
		}
	});
	//菜单隐藏显示
	hideBtn.on('click',function(){
		if(!mainLayout.hasClass('hide-side')){
			mainLayout.addClass('hide-side');
		}else{
			mainLayout.removeClass('hide-side');
		}
	})
	//默认ajax加载welcome
	var index = layer.load(2);
	$.ajax({
        method :"get",
		url:scope.welcome,
		success:function(data){
			setTimeout(function(){
				layer.close(index);
				$('.layui-tab-item').eq(0).html(data);
			},1000);
			
		}
	});
	
	//示范一个公告层
/*	layer.open({
	  type: 1
	  ,title: false //不显示标题栏
	  ,closeBtn: false
	  ,area: '300px;'
	  ,shade: 0.8
	  ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
	  ,resize: false
	  ,btn: ['火速围观', '残忍拒绝']
	  ,btnAlign: 'c'
	  ,moveType: 1 //拖拽模式，0或者1
	  ,content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">后台模版1.1版本今日更新：<br><br><br>数据列表页...<br><br>编辑删除弹出功能<br><br>失去焦点排序功能<br>数据列表页<br>数据列表页<br>数据列表页</div>'
	  ,success: function(layero){
	    var btn = layero.find('.layui-layer-btn');
	    btn.find('.layui-layer-btn0').attr({
	      href: 'http://www.layui.com/'
	      ,target: '_blank'
	    });
	  }
	});*/
});