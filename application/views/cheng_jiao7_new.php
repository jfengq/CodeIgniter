<?php include 'templates/head.php';?>
<div class="body">
    <h1>新股7日成交推荐列表</h1>
    <div class="form-group">
        <a href="/">首页</a>
    </div>
    <div>共<?php echo count($chengjiao7) ?>条数据</div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>
                代码
            </th>
            <th>
                名称
            </th>
            <th>
                今日成交
            </th>
            <th>
                操作
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($chengjiao7 as $stock): ?>
            <tr>
                <td>
                    <?php echo substr($stock['code'], 2); ?>
                </td>
                <td>
                    <?php echo $stock['name']; ?>
                </td>
                <td>
                    <?php echo (float)($stock['day0'] / 1); ?>
                </td>
                <td id="<?php echo $stock['code']; ?>">
                    <button class="remove">移出新股</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        $('.remove').on('click', function () {
            var $this = $(this);
            
            if (confirm("确认要将该股票移出新股列表？")) {
                $.ajax({
                    url: '/cheng_jiao7_new/remove_stock?code=' + $this.parent().attr('id'),
                    cache: false,
                    timeout: 5 * 60 * 1000,
                    success: function (data) {
                        alert('操作成功！');
                        window.location.reload();
                    },
                    error: function () {
                        alert('操作失败！');
                    }
                });
            }
        });
    </script>
</div>
