<?php require_once '../app/views/layout/header.php';?>
<h1>Index</h1>
<?php echo $data['title'];?>
<h2><?php echo $data['message'];?></h2>
<ul>
    <?php foreach($data['posts'] as $post):?>
        <li>
           <?php echo $post->title?>
        </li>
        <?php endforeach;?>
</ul>
<?php require_once '../app/views/layout/footer.php';?>