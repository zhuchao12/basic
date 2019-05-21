<?php $this->beginContent('@app/views/layouts/header.php');?>
<?php $this->endContent();?>

<table border="1" cellspacing="0" id="tab">

</table>


<script>


    var list=[];
    list[0]=['1:1|金色','1:2|银色'];
    list[1]=['2:5|64G','2:6|128G'];
    list[2]=['1:2|8G','1:3|16G'];

    var result = descartes(list);
    var product_name = "黑鲨";

    var all_id_value = [];// 组合属性id 数组
    var all_name_value = [];// 组合属性名字 数组

    var i = 0;
    for (var i in result){
        var sku_name = '';
        var sku_name_id = '';
        for (var j in result[i]){
            // 根据 | 分割成数组
            var n = result[i][j].split('|');
            // 组合属性的名字
            if(sku_name==''){
                sku_name = product_name + '-' + n[1];
            }else{
                sku_name += '-' + n[1];
            }
            // 属性组合id
            if(sku_name_id==''){
                sku_name_id = n[0];
            }else{
                sku_name_id += '#'+n[0];
            }
        }
        all_id_value[i] = sku_name_id;
        all_name_value[i] = sku_name;
        i++;
    }

    var html='<tr><td>商品名称</td><td>商品id</td><td>商品库存</td><td>商品价格</td></tr>';
    for (var i in all_name_value) {
        html +='<tr><td><input type="text" name=sku_name['+i+'] value="'+all_name_value[i]+'" hidden/>'+all_name_value[i]+'</td>' +
            '<td><input type="text" name=sku_attr['+i+'] value="'+all_id_value[i]+'" /></td>' +
            '<td><input type="text" name=sku_attr['+i+'] placeholder="库存" value="1000" name=sku_stock['+i+'] /></td>' +
            '<td><input type="text" name=sku_attr['+i+'] placeholder="价格" value="3999" name=sku_price['+i+'] /></td>' +
            '</tr>';
    }
    // console.log(html);
    document.getElementById('tab').innerHTML=html;
    //笛卡儿积组合
    function descartes(list)
    {
//parent上一级索引;count指针计数
        var point = {};
        var result = [];
        var pIndex = null;
        var tempCount = 0;
        var temp  = [];
//根据参数列生成指针对象
        for(var index in list)
        {
            if(typeof list[index] == 'object')
            {
                point[index] = {'parent':pIndex,'count':0}
                pIndex = index;
            }
        }
//单维度数据结构直接返回
        if(pIndex == null)
        {
            return list;
        }
//动态生成笛卡尔积
        while(true)
        {
            for(var index in list)
            {
                tempCount = point[index]['count'];
                temp.push(list[index][tempCount]);
            }
//压入结果数组
            result.push(temp);
            temp = [];
//检查指针最大值问题
            while(true)
            {
                if(point[index]['count']+1 >= list[index].length)
                {
                    point[index]['count'] = 0;
                    pIndex = point[index]['parent'];
                    if(pIndex == null)
                    {
                        return result;
                    }
//赋值parent进行再次检查
                    index = pIndex;
                }
                else
                {
                    point[index]['count']++;
                    break;
                }
            }
        }
    }
</script>

<?php $this->beginContent('@app/views/layouts/bottom.php');?>
<?php $this->endContent();?>
