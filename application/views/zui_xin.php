<?php include 'templates/head.php';?>
<div class="body">
    <h1>股票最新价列表</h1>
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
                1天前
            </th>
            <th>
                2天前
            </th>
            <th>
                3天前
            </th>
            <th>
                4天前
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($zui_xin as $stock): ?>
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
                <td>
                    <?php echo $stock['day3']; ?>
                </td>
                <td>
                    <?php echo $stock['day4']; ?>
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
