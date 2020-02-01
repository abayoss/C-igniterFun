<div class="row">
    <?php foreach ($posts as $post) : ?>
        <div class="col-sm-6 my-2">
            <div class="card">
                <div class="card-header">
                    <small><?php echo $post['created_at']; ?></small>
                    <a href="<?php echo base_url() . 'category/posts/' . $post['categories_id']; ?>">
                        <span class="badge badge-pill badge-primary float-right">
                            @<strong><?php echo $post['name']; ?></strong>
                        </span>
                    </a>
                </div>
                <a href="<?php echo site_url('/posts/' . $post['post_id']) ?>">
                    <img class="img-fluid" src="<?php echo base_url() . 'assets/images/posts/' . $post['post_image']; ?>">
                </a>
                <div class="card-body">
                    <h3 class="card-title"><?php echo $post['title']; ?></h3>
                    <?php echo word_limiter($post['body'], 10); ?>
                </div>
                <div class="card-footer">
                    <a class="btn bt-sm btn-primary" href="<?php echo site_url('/posts/' . $post['post_id']) ?>">...read more</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php if (isset($pagination)) : ?>
    <div>
        <ul class="pagination">
            <li class="pagination-links ml-auto">
                <?php echo $this->pagination->create_links(); ?>
            </li>
        </ul>
    </div>
<?php endif ?>