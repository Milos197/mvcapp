<?php require_once '../app/views/layout/header.php';?>
<h1>Index</h1>
<ul>
    <?php foreach($data as $post):?>
        <li>
        <a href="/posts/show/<?php echo $post->id ?>"><?php echo $post->title ?></a>
            <ul>
                <li>
                <?php echo substr($post->body,0,100)?>
                </li>
                <li>
                <?php
                $user=$this->model('User')->getUserById($post->createdBy);
                echo $user->firstName;?>
                </li>
                <li>
                <?php echo $post->createdAt?>
                </li>
            </ul>
           
        </li>
        <?php endforeach;?>
</ul>
<?php require_once '../app/views/layout/footer.php';?>