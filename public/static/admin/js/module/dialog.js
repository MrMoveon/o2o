layui.define(function(exports){
  var dialog = {
    /*确认框*/
	confirm:function(jsonData){
		layer.confirm(jsonData.message, {
		  btn: ['确定','取消']
		}, function(){
		  	jsonData.success && jsonData.success();
		},function(){
			jsonData.cancel && jsonData.cancel();
		});
	},
	page:function (title,url,w="700px",h="400px") {
         var index=layer.open({
             type: 2,
             title:title,
             area: [w, h],
             fixed: false, //不固定
             maxmin: true,
             content: url
         });
     }
  };
  
  //输出test接口
  exports('dialog', dialog);
});  