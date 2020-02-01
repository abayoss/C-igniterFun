<div class="row pt-3">
    <div class="col col-12">
        <div class="text-danger">
            <?php echo validation_errors(); ?>
        </div>
        <?php echo form_open_multipart('posts/submit'); ?>
        <div class="form-group">
            <label for="category">Category</label>
            <a class='float-right' href="<?php echo base_url() . 'categories/new'; ?>">
                New Category <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
            <select class="form-control" name="category_id">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="title goes here">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea type="text" name="body" id="editor1" class="form-control" placeholder="body goes here"></textarea>
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="btn btn-sm btn-outline-primary" onclick="document.getElementById('inputGroupFile03').click();" type="button">Upload image</button>
                </div>
                <div class="custom-file">
                    <!-- name should be: userfile -->
                    <input type="file" class="custom-file-input" id="inputGroupFile03" name="userfile" id="userfile" size="20">
                    <label class="custom-file-label" for="inputGroupFile03">Choose an image to upload</label>
                </div>
            </div>
        </div>
        <!-- <input type="file" class="btn btn-secondary form-control-file" name="userfile" id="userfile" size="20"> -->
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>