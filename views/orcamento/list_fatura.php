<table class="table  table-striped table-bordered">
    <thead>
        <tr>
            <th><a href="javascript:void(0)">Titulo</a></th>
            <th><a href="javascript:void(0)">Produtos</a></th>
            <th><a href="javascript:void(0)">Gastos</a></th>
            <th><a href="javascript:void(0)">Data</a></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($facturas as $row): ?>
            <tr>
                <td> <?= $row->titulo ?>  </td>
                <td> <?= count($row->getProduto()); ?>  </td>
                <td> <?= $row->getGasto(); ?>$00  </td>
                <td> <?= $row->data_update ?>  </td>
                <td>
                    <a href="index.php?r=factura/view&id=<?= $row->id ?>">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

