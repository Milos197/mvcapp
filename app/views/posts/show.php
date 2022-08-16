<?php require_once '../app/views/layout/header.php';?>
    <h1><?php echo $data['post'][0]->title ?></h1>
    <p><?php echo $data['post'][0]->status ?></p>
    <p>
        <?php if(isset($_SESSION['id'])&&$_SESSION['id']===$data['post'][0]->createdBy): ?>
            <a href="/posts/edit/<?php echo $data['post'][0]->id?>">
            EDIT</a>
            <a href="/posts/delete/<?php echo $data['post'][0]->id ?>">
            DELETE</a>
            <?php endif; ?>
    </p>

    <br>

    <?php foreach($data['post'] as $comment):?>
        <ul>
            <li>
                <?php echo $comment->body ?>
            </li>
            <ul>
                <li>
                    <?php echo $comment->commentCreatedAt ?>
                </li>
                <li>
                    <?php $user=$this->model('User')->getUserById($comment->userId);
                    echo $user->firstName; ?>
                </li>
            </ul>
        </ul>
    <?php endforeach; ?>



    <br>

    <?php if(isset($_SESSION['firstName'])): ?>
        <form method="post" action="/comments/create">
            <div>
                <p>Comment:</p>
                <label for="body"></label>
                <textarea name="body" id="body" cols="30" rows="10"></textarea>
                <?php echo $data['body_error'] ?? null ?>
            </div>
            
            <br>

            <div style="visibility: hidden">
                <label for="postId">Post ID:</label>
                <input type="number" name="postId" id="postId" 
                value="<?php echo $data['post']->id ?>">
            </div>

            <br>

            <div>
                <input type="submit">
            </div>
        </form>
        <?php endif; ?>
<?php require_once '../app/views/layout/footer.php';?>