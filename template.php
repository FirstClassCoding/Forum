<?php

$authors_file = 'authors.json'; #Get file from Data
$posts_file = 'posts.json';

$authors_data = file_get_contents($authors_file); 
$posts_data = file_get_contents($posts_file);

$authors = json_decode($authors_data , true);
$posts = json_decode($posts_data , true);

date_default_timezone_set('Asia/Bangkok');

?>

<html>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <head>
        <link rel = 'stylesheet' href = 'style.css'>
    </head>

    <body class = 'mainbg'>

        <h1 class = 'header-forum'>FirstClassCoding Forum</h1>

        <p class = 'header-timezone'>Your current timezone is: <?php echo date_default_timezone_get();?></p>
        
        <?php
            $num = 0;
            $is_odd_num;

            #Loop for post (Post's count)
            foreach ($posts as $post) {
                $num++;
                $num = $num % 2;
                $is_odd_num = $num == 1 ? True : False ;
        ?>
            
        <div class = 'post-content <?php echo $is_odd_num ? 'white-bg' : 'blue-bg';?>'>
            <p class = 'author-text'>
                <table>
                    <tr>
                        <?php 
                            foreach ($authors as $author) {

                                #Loop for check author
                                if ($author['id'] == $post['author_id']) {
                        ?>
                        <td>
                            <img src = <?php echo $author['avatar_url'];?> style = 'border-radius: 50%; height: 25px;'>
                        </td>
                        <td>
                            <font style = 'color: #FF6335'><b><?php echo $author['name'];?></b></font>
                            <font style = 'color: #737373'> posted on 
                             <?php 
                                echo date('l, F j, Y, H:i' , strtotime($post['created_at']));
                            ?>
                            </font>
                        </td>
                        <?php }} ?>
                    </tr>
                </table>
            </p>
            <table>
                <tr>
                    <td class = 'set-pic'>
                        <img src = <?php echo $post['image_url'];?>>
                    </td>
                    <td class = 'set-text'>
                        <h3><?php echo $post['title'];?></h3>
                        <p><?php echo $post['body'];?></p>
                    </td>
                </tr>
            </table>
        </div>

        <?php } ?>

    </body>

</html>