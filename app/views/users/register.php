<form method="POST">
    <div>
        <label for="firstName">First name:</label>
        <input required type="name" id="firstName" name="firstName" 
        value="<?php echo $data['firstName'] ?? null ?>">
        <?php echo $data['firstName_error'] ?? null ?>
    </div>

    <br>

    <div>
        <label for="lastName">Last name:</label>
        <input type="text" id="lastName" name="lastName" 
        value="<?php echo $data['lastName'] ?? null ?>">
        <?php echo $data['lastName_error'] ?? null ?>
    </div>

    <br>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" 
        value="<?php echo $data['email'] ?? null ?>">
        <?php echo $data['email_error'] ?? null ?>
    </div>

    <br>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password"
        value="<?php echo $data['password'] ?? null?>">
        <?php echo $data['password_error'] ?? null ?>
    </div>

    <br>

    <div>
        <label for="passwordRep">Repeat password</label>
        <input type="password" id="passwordRep" name="passwordRep" 
        value="<?php echo $data['passwordRep'] ?? null?>">
        <?php echo $data['passwordRep_error'] ?? null ?>
    </div>

    <br>

    <div>
        <input type="submit">
    </div>
</form>