<form method='POST'>
    <div>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email"
        value="<?php echo $data['email'] ?? null ?>">
        <?php echo $data['email_error'] ?? null ?>
    </div>

    <br>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <?php echo $data['password_error'] ?? null ?>   
    </div>

    <br>

    <div>
        <input type="submit">
    </div>
</form>