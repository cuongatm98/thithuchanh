<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Thêm mới sản phẩm
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input type="text" name="tenhang" class="form-control">
                        <?php if (isset($errors['tenhang'])): ?>
                            <p class="text-danger"><?php echo $errors['tenhang'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loại sản phẩm</label>
                        <input type="text" class="form-control" name="loaihang">
                        <?php if (isset($errors['loaihang'])): ?>
                            <p class="text-danger"><?php echo $errors['loaihang'] ?></p>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>