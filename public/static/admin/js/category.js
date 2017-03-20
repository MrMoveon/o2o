/**
 * Created by asus on 2017/3/20.
 */
layui.use(['form', 'jquery', 'laydate','laypage','dialog'], function() {
    var form = layui.form(),
        layer = layui.layer,
        $ = layui.jquery,
        laypage=layui.laypage,
        laydate = layui.laydate,
        dialog = layui.dialog;


    //删除
    $('.del-btn').on('click',function(){
        dialog.confirm({
            'message':'确定要删除吗？',
            'success':function(){
                console.log('删除成功');
                layer.closeAll();
            },
            'cancel':function(){}
        });
    })
    //提示
    $('.addBtn').mouseenter(function(){
        layer.tips('添加', '.addBtn', {
            tips: [1, '#444c63'], //还可配置颜色
            time: 1000
        });
    })
    $('.delBtn').mouseenter(function(e){
        e.preventDefault();
        layer.tips('删除', '.delBtn', {
            tips: [1, '#444c63'], //还可配置颜色
            time: 1000
        });
    })
    $('#category-add-btn').on('click',function(){
        dialog.page("生活分类添加",scope.categoryAdd,w="700px",h="330px");
    })
    //全选
    form.on('checkbox(allChoose)', function(data) {
        var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]');
        child.each(function(index, item) {
            item.checked = data.elem.checked;
        });
        form.render('checkbox');
    });
    form.on('select(state)', function(data) {
        console.log(data.elem); //得到select原始DOM对象
        console.log(data.value); //得到被选中的值
        console.log(data.othis); //得到美化后的DOM对象
        form.render('select');
    });
    form.render();
    //分页
    laypage({
        cont: 'page'
        ,pages: 10
        ,skin: '#1E9FFF'
    });
});