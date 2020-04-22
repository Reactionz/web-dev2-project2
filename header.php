
<header>
    <?php if ($userName != null): ?>
        <h1> Welcome <?= $userName ?>! </h1>
    <?php else: ?>
        <h1> Welcome Guest! </h1>
    <?php endif; ?>
</header>