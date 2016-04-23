<?php include '../config/Connect.php'; ?>
<div class="uk-panel uk-panel-box uk-width-medium-10-10">
    <div class="uk-panel-badge uk-badge uk-badge-info">
        <a href="index.php?page=form_bill_in" class="uk-button uk-button-primary uk-button-mini">เพิ่ม</a>
    </div>
    <h3 class="uk-panel-title">ใบส่งสินค้า/ใบกำกับภาษีจากผู้จัดจำหน่าย</h3>
    <table class="uk-table uk-table-condensed uk-table-line dataTable">
        <thead>
            <tr>
                <th>เลขที่ใบกำกับภาษี</th>
                <th>วันที่รับสินค้า</th>
                <th>รหัสผู้จัดจำหน่าย</th>
                <th>เลขที่ใบสั่งซื้อ</th>
                <th>วันที่สั่งซื้อ</th>
                <th>วันที่แก้ไข/สร้าง</th>
               <!-- <th>แก้ไข</th>
                <th>ลบ</th>-->
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM bill_in WHERE billin_status > 0 order by billin_id";
            $query = mysql_query($sql) or die(mysql_error());
            while ($row = mysql_fetch_array($query)):
                ?>
                <tr>
                    <td><?= $row['billin_id'] ?></td>
                    <td><?= $row['billin_invoicescode'] ?></td>
                    <td><?= $row['billin_taxcode'] ?></td>
                    <td><?= change_dateYMD_TO_DMY($row['billin_updatedate']) ?></td>
                    <td><a href="index.php?page=form_bill_in&id=<?= $row['billin_id'] ?>"><button class="uk-button uk-button-success"><i class="uk-icon-edit"></i></button></a></td>
                    <td><button class="uk-button uk-button-danger" onclick="deleteItem(<?= $row['billin_id'] ?>, '../database/db_bill_in.php?method=delete')"><i class="uk-icon-trash-o"></i></button></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>

