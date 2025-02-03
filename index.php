<?php include("path.php"); ?>
<?php include_once(ROOT_PATH . "/app/controllers/topics.php"); ?>

<?php $posts = getPublishedPosts(); 

$months = array(
    'January' => 'Styczeń',
    'February' => 'Luty',
    'March' => 'Marzec',
    'April' => 'Kwiecień',
    'May' => 'Maj',
    'June' => 'Czerwiec',
    'July' => 'Lipiec',
    'August' => 'Sierpień',
    'September' => 'Wrzesień',
    'October' => 'Październik',
    'November' => 'Listopad',
    'December' => 'Grudzień'
);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/9af4095257.js" crossorigin="anonymous"></script>
   
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lora&family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Podróż Smaków</title>
</head>
<body>
    
        <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
        <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
         
         <!-- Content -->
         <div class="content clearfix">

            <!-- Main Contnet -->
            <div class="main-content">
                
                <h2 class="recent-post-title"><?php echo $postsTitle ?></h2>
                
                <hr>
                    
                <!-- Post  -->
                <?php foreach($posts as $post): ?>
                    <div class="far calendar">
                        <span class="dot"></span>
                        <?php setlocale(LC_TIME, 'pl_PL.utf8'); // Ustawienie lokalizacji na polską ?>
                        <?php echo str_replace(array_keys($months), array_values($months), date('j F Y', strtotime($post['created']))); ?>
                    </div>
                
    
                    <div class="post clearfix">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" width="690" height="268" class="post-image">
                        <div class="post-preview">
                            <h3><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>
                            
                            
                            <p class="preview-text">
                                <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
                            </p>
                            <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Zobacz przepis</a>
                        </div>
                    </div>
                
                <?php endforeach; ?>
                
            </div>
            
            <!-- //Main Content -->
        
    
        </div>
        <!-- //Content -->

    <!-- Footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
    <!-- //Footer -->

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Utworzony skrypt -->
    <script src="assets/js/script.js"></script>
</body>
</html>