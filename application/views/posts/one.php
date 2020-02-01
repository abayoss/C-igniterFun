<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <small><?php echo $post['created_at']; ?></small>
                <a href="<?php echo base_url() . 'category/posts/' . $post['categories_id']; ?>">
                    <span class="badge badge-pill badge-primary float-right">
                        @<strong><?php echo $post['name']; ?></strong>
                    </span>
                </a> </div>
            <img class="img-fluid p-3" src="<?php echo base_url() . 'assets/images/posts/' . $post['post_image']; ?>">
            <div class="card-body">
                <!-- <h3 class="card-title"><?php echo $post['title']; ?></h3> -->
                <p class="card-text"><?php $post['body']; ?></p>
            </div>
            <?php if ($this->session->userdata('user_id') == $post['post_user_id']) : ?>
                <div class="card-footer">
                    <?php echo form_open('posts/edit/' . $post['post_id'], ['class' => 'form-inline']); ?>
                    <button class="btn bt-sm btn-warning">update</button>
                    </form>
                    <?php echo form_open('posts/delete/' . $post['post_id'], ['class' => 'form-inline']); ?>
                    <button class="btn bt-sm btn-danger">Delete</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if ($this->session->userdata('logged_in')) : ?>
    <div class="text-danger">
        <?php echo validation_errors(); ?>
    </div>
    <div class="row pt-3">
        <div class="col col-12">
            <?php echo form_open('comments/submit/' . $post['post_id']); ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Your name goes here" required>
            </div>
            <div class="form-group">
                <label for="body">Comment</label>
                <textarea type="text" name="body" class="form-control" placeholder="Comment goes here" required></textarea>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-block">Add Comment</button>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php foreach ($comments as $comment) : ?>
    <div class="row pt-3">
        <div class="col col-12">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $comment['name'] ?></h4>
                    <p class="card-text"><?php echo $comment['body'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>