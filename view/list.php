<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Danh sách sản phẩm
        </div>
        <div class="card-body">
            <div class="col-12">
                <a class="btn btn-success mb-2" href="./index.php?page=add">Thêm mới</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sanpham as $key => $sp): ?>
                    <tr>
                        <td><?php echo ++$key ?></td>
                        <td><?php echo $sp->tenhang ?></td>
                        <td><?php echo $sp->loaihang ?></td>
                        <td><a href="./index.php?page=delete&masp=<?php echo $sp->masp; ?>"
                               class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xoá?')">Delete</a>
                            <a href="./index.php?page=edit&masp=<?php echo $sp->masp; ?>"
                               class="btn btn-primary btn-sm">Update</a></td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>