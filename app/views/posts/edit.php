<?php require_once '../app/views/layout/header.php';?>
<form method="post">
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" 
        value="<?php echo $data['data']['user']->title ?? null  ?>">
       <?php echo $data['error']['title_error'] ?? null ?>
    </div>

    <br>

    <div>
        <label for="body">Body:</label>
        <input type="text" id="body" name="body"
        value="<?php echo $data['data']['user']->body ?? null ?>">
        <?php echo $data['error']['body_error'] ?? null ?>
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
        <select name="category[]" id="category" multiple="multiple">
            <?php foreach($data['categories'] as $category):?>
                <option value="<?php echo $category->id ?>"><?php echo $category->title ?></option>
            <?php endforeach; ?>
        </select>
        <?php echo $data['error']['category_error'] ?? null ?>
    </div>

    <br>

    <div>
        <input type="submit">
    </div>
</form>