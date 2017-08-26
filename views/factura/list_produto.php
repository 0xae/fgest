<table style="margin-top: 20px;" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width: 50%;"><a href="javascript:void(0)">Descrição</a></th>
            <th><center><a href="javascript:void(0)">Pre&ccedil;o</a></center></th>
            <th><center><a href="javascript:void(0)">Quantidade</a></center></th>
            <th><center><a href="javascript:void(0)">Total</a></center></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($produtos as $p): ?>
            <tr>
                <td><?= $p->descricao;?></td>
                <td>
                    <center>
                        <?= $p->valor;?>$00
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
                        <?= $p->quantidade * $p->valor;?>$00
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
                    0.00$00
                </center>
            </th>
            <th>
                <center>
                    0.00$00
                </center>
            </th>
            <th>
                <center>
                    0.00$00
                </center>
            </th>
        </tr>
    </tfoot>
</table>
