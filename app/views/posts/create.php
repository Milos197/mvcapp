<form method="post">
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" placeholder="Title"
        value="<?php echo $data['title'] ?? null  ?>">
        <?php echo $data['title_error'] ?? null ?>
    </div>

    <br>

    <div>
        <label for="body">Body:</label>
        <input type="text" id="body" name="body" placeholder="Body"
        value="<?php echo $data['body'] ?? null ?>">
        <?php echo $data['body_error'] ?? null ?>
    </div>
    
    <br>

    <div>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="draft">draft</option>
            <option value="published">published</option>
        </select>
    </div>
    
    <br>

    <div>
        <label for="category">Categories:</label>
        <select name="category" id="category" multiple="multiple">

        </select>
    </div>

    <br>

    <div>
        <input type="submit">
    </div>
</form>