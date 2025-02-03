<?php include_once(ROOT_PATH . "/app/controllers/topics.php");

$posts = array();
$postsTitle = 'NAJNOWSZE WPISY';

if(isset($_GET['t_id'])) {
    $posts = getPostsByTopicId($_GET['t_id']);
    $postsTitle = $_GET['name'];
} else if(isset($_POST['search-term'])) {
    $postsTitle = "Wyniki wyszukiwania dla: '" . $_POST['search-term'] . "'";
    $posts = searchPosts($_POST['search-term']);
} else {
$posts = getPublishedPosts();
}

?>
<header>

        <div class="logo">
            <a href="<?php echo BASE_URL . '/index.php' ?>"><h1 class="logo-text"><span>Podróż</span>Smaków</h1></a>
        </div>
        
        <i class="fa fa-bars menu-toggle"></i>

        <div class="search-bar">
            <form action="index.php" method="post">
                <button type="submit"><i class="fa fa-search"></i></button>
                <input type="text" name="search-term" class="text-input" placeholder="Szukaj...">
            </form>
        </div>
        
        <ul class="nav">
            <li><a href="<?php echo BASE_URL . '/index.php' ?>">Strona główna</a></li>
            <li><a href="#">Kategorie</a>
                <ul style="left: 0px;">
                    <?php foreach ($topics as $key => $topic): ?>
                        <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>

            <?php if(isset($_SESSION['id'])): ?>

            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <?php echo $_SESSION['username']; ?>
                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                </a>
                <ul>
                    <?php if($_SESSION['admin']): ?>
                    <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Panel administratora</a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Wyloguj się &nbsp;<i class="fas fa-sign-out"></i></a></li>
                </ul>
            </li>
            
            <?php else: ?>
                <li><a href="<?php echo BASE_URL . '/register.php' ?>">Załóż konto</a></li>
                <li><a href="<?php echo BASE_URL . '/login.php' ?>">Zaloguj się</a></li>
            <?php endif; ?>

        </ul>
    </header>