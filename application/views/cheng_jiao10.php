<?php include 'templates/head.php';?>
<div class="body">
    <h1>10日成交推荐列表</h1>
    <div class="form-group">
        <a href="/">首页</a>
    </div>
    <div>共<?php echo count($chengjiao10) ?>条数据</div>
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
        </tr>
        </thead>
        <tbody>
        <?php foreach ($chengjiao10 as $stock): ?>
            <tr>
                <td>
                    <?php echo substr($stock['code'], 2); ?>
                </td>
                <td>
                    <?php echo $stock['name']; ?>
                </td>
                <td>
                    <?php echo float($stock['day0'] / 10000, 2); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <script>
    </script>
</div>
