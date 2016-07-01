<?php include 'templates/head.php';?>
<div class="body">
    <h1>股票涨幅列表</h1>
    <div class="form-group">
        <a href="/">首页</a>
    </div>
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
                今天
            </th>
            <th>
                昨天
            </th>
            <th>
                前天
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($zhang_fu as $stock): ?>
            <tr>
                <td>
                    <?php echo substr($stock['code'], 2); ?>
                </td>
                <td>
                    <?php echo $stock['name']; ?>
                </td>
                <td>
                    <?php echo $stock['day0']; ?>
                </td>
                <td>
                    <?php echo $stock['day1']; ?>
                </td>
                <td>
                    <?php echo $stock['day2']; ?>
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
