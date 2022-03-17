<form method="post">
    <input type="text" name="name" placeholder="Name" value="<?php echo $user->name?>">
    <input type="email" name="email" placeholder="Email" value="<?php echo $user->email?>">
    <input type="password" name="password" placeholder="Password" value="<?php echo $user->password?>">
    <input type="date" name="birthday" placeholder="Birthday" value="<?php echo $user->birthday?>">
    <!--    <input type="text" name="country" placeholder="Country">-->
    <select name="country">
        <option <?php echo $user->country=="Hà Nội"? "selected":""?> value="Hà Nội">Hà Nội</option>
        <option <?php echo $user->country=="Phú Thọ"? "selected":""?> value="Phú Thọ">Phú Thọ</option>
        <option <?php echo $user->country=="Vĩnh Phúc"? "selected":""?> value="Vĩnh Phúc">Vĩnh Phúc</option>
        <option <?php echo $user->country=="Thanh Hóa"? "selected":""?> value="Thanh Hóa">Thanh Hóa</option>
    </select>
    <button>Update</button>
    <a href="index.php">
        <button>Back</button>
    </a>
</form>