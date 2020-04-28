<?php

?>

<br/>
<div align="center">
    <a href="index.php?r=user/admin"><h1>Admin Panel</h1></a>
    <a href="/"><h1>Sign Up Panel</h1></a>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>name</th>
            <th>eMail</th>
            <th>Password Hash</th>
        </tr>
        <tbody>
        <?php for($i = 0; $i < count($dbData); $i ++): ?>
                <td><?= $dbData[$i][1] ?></td>
                <td><?= $dbData[$i][2] ?></td>
                <td><?= $dbData[$i][3] ?></td>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>
</div>


