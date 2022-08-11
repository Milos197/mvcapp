<?php require_once '../app/views/layout/header.php';?>
<h1>Hi <?php echo($_SESSION['firstName']) ?></h1>
<ul>
    <?php foreach($data['posts'] as $post):?>
        <li>
            <p><?php echo $post->title ?></p>
            <br>
            <a href="/posts/edit/<?php echo $post->id?>">EDIT</a>
            <a href="/posts/delete/<?php echo $post->id?>">DELETE</a>
        </li>
        <?php endforeach; ?>
</ul>