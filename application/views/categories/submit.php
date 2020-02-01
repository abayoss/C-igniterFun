<div class="row pt-3">
    <div class="col col-12">
        <div class="text-danger">
            <?php echo validation_errors(); ?>
        </div>
        <?php echo form_open('categories/new'); ?>
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="category name goes here">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit Category</button>
        </form>
    </div>
</div>