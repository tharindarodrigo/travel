<?php require_once('emailStructure/header1.php'); ?>
    <style type="text/css">
        th {
            font-size: medium;
        }
    </style>


    <h2 align="center">INVOICE</h2>
    <hr/>

    <h3>Hotel Reservations</h3>
    <hr/>
    <table class="table" border="1px" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <th width="80%">Description</th>
            <th width="20%">Amount</th>
        </tr>
        <tr>
<!--            --><?php //foreach ($booking->vouchers as $voucher) { ?>

                <td>

                </td>

<!--            --><?php //} ?>
                <td align="right">
                    123.00
                </td>
        </tr>

        <?php //transportation here ?>

        <tr>
            <td></td>
            <td align="right"></td>
        </tr>

        <tr>
            <th>Total</td>
            <td align="right">10000</td>
        </tr>
    </table>
    <h3>Transportation</h3>


<?php require_once('emailStructure/footer.php'); ?>