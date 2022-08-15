<?php require_once '../app/views/layout/header.php';?>
    <h1><?php echo $data['post']->title ?></h1>
    <p><?php echo $data['post']->status ?></p>
    <p>
        <?php if(isset($_SESSION['id'])&&$_SESSION['id']===$data['post']->createdBy): ?>
            <a href="/posts/edit/<?php echo $data['post']->id ?>">
            EDIT</a>
            <a href="/posts/delete/<?php echo $data['post']->id ?>">
            DELETE</a>
            <?php endif; ?>
    </p>
    <?php if(isset($_SESSION['firstName'])): ?>
        <form method="post" action="/comments/create">
            <div>
                <label for="body">Comment:</label>
                <input type="text" name="body" id="body">
                <?php echo $data['body_error'] ?? null ?>
            </div>

            <br>

            <div>
                <input type="submit">
            </div>
        </form>
        <?php endif; ?>
<?php require_once '../app/views/layout/footer.php';?>