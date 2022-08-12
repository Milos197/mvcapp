<?php require_once '../app/views/layout/header.php';?>
    <h1><?php echo $data['post']->title ?></h1>
    <p><?php echo $data['post']->status ?></p>
    <p>
        <?php var_dump($_SESSION['id'],$data['post']->createdBy);
        ?>
        <?php if($_SESSION['id']===$data['post']->createdBy):?>
            <a href="/posts/edit/<?php echo $data['post']->id?>">EDIT</a>
            <a href="/posts/delete/<?php echo $data['post']->id?>">DELETE</a>
            <?php endif; ?>
    </p>
<?php require_once '../app/views/layout/footer.php';?>