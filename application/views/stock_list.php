<?php include 'templates/head.php';?>
<div class="body">
    <h1>股票列表</h1>
    <div class="form-group">
        <a href="/">首页</a>
    </div>
    <div class="row">
        <button id="init_stock" class="btn btn-default">更新票代码数据库</button>
    </div>
    <br/>
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
                最新价
            </th>
            <th>
                最高价
            </th>
            <th>
                最低价
            </th>
            <th>
                涨幅
            </th>
            <th>
                成交量
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($stock_list as $stock): ?>
            <tr>
                <td>
                    <?php echo substr($stock['code'], 2); ?>
                </td>
                <td>
                    <?php echo $stock['name']; ?>
                </td>
                <td>
                    <?php echo $stock['zuixin']; ?>
                </td>
                <td>
                    <?php echo $stock['zuigao']; ?>
                </td>
                <td>
                    <?php echo $stock['zuidi']; ?>
                </td>
                <td>
                    <?php echo $stock['zhangfu']; ?>
                </td>
                <td>
                    <?php echo $stock['chengjiao']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row">
        <button id="prev" class="btn btn-default">上一页</button>
        &nbsp;
        <button id="next" class="btn btn-default">下一页</button>
    </div>
    <script>
        $('#init_stock').on('click', function () {
            if (confirm('确定要更新数据库数据？')) {
                $.ajax({
                    url: '/stock_list/init_stock',
                    cache: false,
                    timeout: 5 * 60 * 1000,
                    success: function (data) {
                        console.log('更新数据库成功！');
                        console.log(data);
                        window.location.reload();
                    },
                    error: function () {
                        console.log('更新数据库失败！');
                    }
                });
            }
        });
    </script>
    <script>
        $('#prev').on('click', function () {
            var currentPage = window.location.href.split('/').pop();

            if (currentPage > 0) {
                currentPage = currentPage - 1;
            }
            window.location.href = currentPage + '';
        });

        $('#next').on('click', function () {
            var currentPage = window.location.href.split('/').pop();

            currentPage = +currentPage + 1;
            window.location.href = currentPage + '';
        });
    </script>
</div>
