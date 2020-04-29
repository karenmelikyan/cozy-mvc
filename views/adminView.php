<br/>
<div align="center">
    <a href="<?= Config::$conf['domain']; ?>"><h1>Sign Up Panel</h1></a>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <table>
        <thead>
        <tr>
            <th>name</th>
            <th>eMail</th>
            <th>Password Hash</th>
        </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($dbData); $i ++): ?>
        <tr>
            <td><?= $dbData[$i][1] ?></td>
            <td><?= $dbData[$i][2] ?></td>
            <td><?= $dbData[$i][3] ?></td>
        </tr>
        <?php endfor; ?>
        </tbody>
    </table>
</div>


