<?php require_once '../app/views/layout/header.php';?>
<ul>
    <?php foreach($data['posts'] as $post):?>
        <li>
            <a href="/posts/show/<?php echo $post->id?>"><?php echo $post->title?></a>
        </li>
        <?php endforeach;?>
</ul>
<?php require_once '../app/views/layout/footer.php';?>