<?php ob_start() ?>
<?php if (isset($_SESSION['connected'])) : ?>
    <ul>
        <li><a href=. />Accueil</a></li>
        <li><a href="">Add Roles</a></li>
    </ul>
<?php else : ?>
    <ul>
        <li><a href=. />Accueil</a></li>
        <li><a href="./add/user">Add User</a></li>
    </ul>
<?php endif; ?>
<?php $navbar = ob_get_clean() ?>