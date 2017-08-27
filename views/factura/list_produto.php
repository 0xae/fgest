<table style="margin-top: 20px;" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width: 50%;"><a href="javascript:void(0)">Descrição</a></th>
            <th><center><a href="javascript:void(0)">Pre&ccedil;o</a></center></th>
            <th><center><a href="javascript:void(0)">Quantidade</a></center></th>
            <th><center><a href="javascript:void(0)">Subtotal</a></center></th>
        </tr>
    </thead>

    <tbody>
        <?php 
            $totalPreco = 0;
            $totalQuantidade = 0;
            $total = 0;
            foreach ($produtos as $p): 
                $subtotal = ($p->valor * $p->quantidade);
                $totalPreco += $p->valor;
                $totalQuantidade += $p->quantidade;
                $total += $subtotal;
        ?>
            <tr>
                <td><?= $p->descricao;?></td>
                <td>
                    <center>
                        <span class="money"><?= $p->valor;?></span>$00
                        <small> (<?= $p->iva ?>% IVA) </small>
                    </center>
                </td>
                <td>
                    <center>
                        <?= $p->quantidade;?>un.
                    </center>
                </td>
                <td>
                    <center>
                        <span class="money"><?= $subtotal; ?></span>$00
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

    <tfoot>
        <tr>
            <th style="width: 50%;">
                <center>
                    TOTAL
                <center>
            </th>
            <th>
                <center>
                    <span class="money"><?= $totalPreco ?></span>$00
                </center>
            </th>
            <th>
                <center>
                    <?= $totalQuantidade ; ?> un.
                </center>
            </th>
            <th>
                <center>
                    <span class="money"><?= $total ?></span>$00
                </center>
            </th>
        </tr>
    </tfoot>
</table>
