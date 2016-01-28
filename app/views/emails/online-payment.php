<?php require_once('emailStructure/header1.php'); ?>

<table border="0" width="100%"   style="margin-top: -11px;">
    <tr>
        <td><h2 align="left" style="background: #00517e; padding: 10px; color: #FFFFFF ">Reference No
                : <?php echo $booking->reference_number ?>
        </td>
        <td align="right"><h2 align="right" style="background: #00517e; padding: 10px; color: #FFFFFF ">Online Payment

        </td>
    </tr>
</table>
<hr/>
<br/>
<div>
    <div>
        <table width="100%" border="1px" cellspacing="0" cellpadding="10" style="font-size: 15px;">
            <tr style="background: ">
                <td colspan="2" style="background: lightgrey">Payment Details</td>
            </tr>
            <tr>
                <th>Name</th>
                <td> <?php echo $booking->booking_name; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td> <?php echo $booking->email; ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td> <?php echo $booking->phone; ?></td>
            </tr>
            <tr>
                <th>Remark</th>
                <td> <?php echo $booking->remark; ?></td>
            </tr>
            <tr>
                <th>Amount</th>
                <td> <?php echo number_format($payment->amount); ?></td>
            </tr>

        </table>
    </div>

</div>
<br/>
<?php require_once('emailStructure/footer.php'); ?>
