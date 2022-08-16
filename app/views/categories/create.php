<form method="post">
    <h1>Create category</h1>
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">
        <?php echo $data['error'] ?? null ?>
    </div>

    <br>

    <div>
        <input type="submit">
    </div>
</form>