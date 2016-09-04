<?php include 'templates/head.php';?>
<div class="body">
    <h1>30日成交推荐列表</h1>
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
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <script>
    </script>
</div>
