<?php require_once '../app/views/layout/header.php';?>
<h1>Index</h1>
<?php echo $data['title'];?>
<h2><?php echo $data['message'];?></h2>
<ul>
    <?php foreach($data['posts'] as $post):?>
        <li>
            <ul>
                <li>
                <?php echo $post->title?>
                </li>
                <li>
                <?php echo substr($post->body,0,100)?>
                </li>
                <li>
                <?php echo $post->createdBy?>
                </li>
                <li>
                <?php echo $post->createdAt?>
                </li>
            </ul>
           
        </li>
        <?php endforeach;?>
</ul>
<?php require_once '../app/views/layout/footer.php';?>