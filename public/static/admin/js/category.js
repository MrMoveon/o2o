/**
 * Created by asus on 2017/3/20.
 */
layui.use(['form', 'jquery', 'laydate','laypage','dialog','formate'], function() {
    var form = layui.form(),
        layer = layui.layer,
        $ = layui.jquery,
        laypage=layui.laypage,
        laydate = layui.laydate,
        dialog = layui.dialog,
         formate=layui.formate;

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
        dialog.page("生活分类添加",categoryScope.categoryAdd,w="700px",h="330px");
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

    /*ajax分页*/
    var pages=0;
    var data;
    $.get(categoryScope.categoryPages,function (res1) {
        //获取分页数
        pages=res1.data.pages;
        var index=layer.load(2);
        setTimeout(function () {
            laypage({
                cont: 'page'
                ,pages: pages //得到总页数
                ,jump: function(obj){
                    $.post(categoryScope.categoryList,{current:obj.curr},function (res) {
                        //获取的数据
                        data=res.data.list;
                        //填充数据
                        document.getElementById('category-list').innerHTML = render(obj.curr,data);
                        //
                        layer.close(index);
                        form.render('checkbox');
                    },'json');

                }
            });
        },100)

    },'json')

    //模拟渲染
    var render = function(curr,data){
        //此处只是演示，实际场景通常是返回已经当前页已经分组好的数据
        var str = '';
        for(var i in data){
            str+='<tr>'
                +'<td><input type="checkbox" name="" lay-skin="primary"></td>'
                +'<td>'+data[i].id+'</td>'
                +'<td><input type="text" name="title"  autocomplete="off" class="layui-input" value="0"></td>'
                +'<td>'+data[i].name+'</td>'
                +'<td>'+formate.ge_time_format(data[i].create_time)+'</td>'
                +'<td>'+formate.ge_time_format(data[i].update_time)+'</td>'
                +'<td>'+data[i].status+'</td>'
                +'<td>'
                +'<div class="layui-inline">'
                +'<button class="layui-btn layui-btn-small layui-btn-normal "><i class="layui-icon">&#xe642;</i></button>'
                +'<button class="layui-btn layui-btn-small layui-btn-danger del-btn"><i class="layui-icon">&#xe640;</i></button>'
                +'</div>'
                +'</td>'
                +'</tr>';
        }
        return str;
    };

});