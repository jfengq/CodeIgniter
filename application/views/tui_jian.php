<?php include 'templates/head.php';?>
<div class="body">
    <h1>今日推荐列表</h1>
    <div class="form-group">
        <a href="/">首页</a>
    </div>
    <form class="form-group" method="get">
        <div class="row">
            <div class="form-group">
                <span class="">天数：</span>
                <select name="day" value="<?php echo $day ;?>">
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <span class="">成交量：</span>
                <select name="chengjiao" value="<?php echo $chengjiao ;?>">
                    <option value="1.2">1.2</option>
                    <option value="1.1">1.1</option>
                    <option value="1">1</option>
                    <option value="0.9">0.9</option>
                    <option value="0.8">0.8</option>
                    <option value="0.7">0.7</option>
                    <option value="0.6">0.6</option>
                </select>
                <span class="">最高价：</span>
                <select name="zuigao" value="<?php echo $zuigao ;?>">
                    <option value="30">30</option>
                    <option value="25">25</option>
                    <option value="35">35</option>
                    <option value="20">20</option>
                    <option value="40">40</option>
                    <option value="250">250</option>
                </select>
            </div>
            <div class="form-group">
                <span class="">当日涨幅：</span>
                <select name="zhangfu0" value="<?php echo $zhangfu0 ;?>">
                    <option value="8">8</option>
                    <option value="11">11</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                </select>
                <span class="">前日涨幅：</span>
                <select name="zhangfu1" value="<?php echo $zhangfu1 ;?>">
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="11">11</option>
                </select>
                <span class="">2日涨幅：</span>
                <select name="zhangfu2" value="<?php echo $zhangfu2 ;?>">
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="12">12</option>
                    <option value="11">11</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>
            </div>
            <div class="form-group">
                <span class="">3日涨幅：</span>
                <select name="zhangfu3" value="<?php echo $zhangfu3 ;?>">
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="16">16</option>
                    <option value="15">15</option>
                    <option value="14">14</option>
                    <option value="13">13</option>
                    <option value="12">12</option>
                    <option value="11">11</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                </select>
            </div>
        </div>

        <button class="btn btn-default" type="submit">查询</button>
    </form>
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
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tui_jian as $stock): ?>
            <tr>
                <td>
                    <?php echo substr($stock['code'], 2); ?>
                </td>
                <td>
                    <?php echo $stock['name']; ?>
                </td>
                <td>
                    <?php echo number_format($stock['day0'] / 100000, 0) . '/' . number_format($stock['day0'] / $stock['day1'], 2); ?>
                </td>
                <td>
                    <?php echo number_format($stock['day1'] / 100000, 0) . '/' . number_format($stock['day1'] / $stock['day2'], 2); ?>
                </td>
                <td>
                    <?php echo number_format($stock['day2'] / 100000, 0) . '/1'; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <script>

    </script>
</div>
