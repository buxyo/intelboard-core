<?php
$currentPath = $_SERVER['REQUEST_URI'];
function isActive($path)
{
    global $currentPath;
    return $currentPath === $path ? 'active' : '';
}
?>
<div class="sidebar">
    <ul>
        <li class="<?= isActive('/dashboard') ?>"><a href="/dashboard"><?= Lang::get('sidebar.dashboard') ?></a></li>
        <li class="<?= isActive('/drivers') ?>"><a href="/drivers"><?= Lang::get('sidebar.drivers') ?></a></li>
        <li class="<?= isActive('/add-driver') ?>"><a href="/add-driver"><?= Lang::get('sidebar.add_driver') ?></a></li>
        <li><a href="/logout"><?= Lang::get('sidebar.logout') ?></a></li>
    </ul>
</div>
