<?php

use App\Helpers\Formatter;

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
            <?php if($transactions !== null):?>
                <?php foreach($transactions as $transaction) : ?>
                     <tr>
                        <th><?= Formatter::formatDate($transaction['transitioned_at'])?></th>
                        <th><?= ($transaction['check_number'])?></th>
                        <th><?= ($transaction['transaction_desc'])?></th>
                        <th><?= Formatter::formatAmount($transaction['amount'])?></th>
                    </tr>  
                <?php endforeach ?>
            <?php endif ?>
            </tbody>
            <tfoot>
         
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?= Formatter::formatAmount($this->totals['income']) ?></td>
            
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?= Formatter::formatAmount($this->totals['expense']) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?= Formatter::formatAmount($this->totals['total']) ?></td>
                </tr>
                <?php ?>
            </tfoot>
        </table>
    </body>
</html>
