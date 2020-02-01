<div class="row pt-3">
    <div class="col col-12">
        <div class="text-danger">
            <?php echo validation_errors(); ?>
        </div>
        <?php echo form_open_multipart('posts/update/' . $post['post_id']); ?>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category_id">
                <option selected hidden value="<?php echo $post['category_id'] ?>">
                    <?php echo $post['name'] ?>
                </option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input value="<?php echo $post['title']; ?>" type="text" name="title" id="title" class="form-control" placeholder="title goes here">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea value="<?php echo $post['body']; ?>" type="text" name="body" id="editor1" class="form-control" placeholder="body goes here"> <?php echo $post['body']; ?></textarea>
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
        <button type="submit" class="btn btn-warning btn-block">Submit Edit</button>
        </form>
    </div>
</div>