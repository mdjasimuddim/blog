<?php include('path.php');?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
adminOnly();
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora"
            rel="stylesheet">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="assets/css/admin.css">

        <title>Admin Section - Add Post</title>
    </head>

    <body>
        <header>
            <a class="logo" href="<?php echo BASE_URL.'/index.php';?>">
                <h1 class="logo-text"><span>Golden</span>It</h1>
            </a>
            <i class="fa fa-bars menu-toggle"></i>
            <ul class="nav">
                <?php if(isset($_SESSION['username'])):?>
                    <li>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <?php echo $_SESSION['username'];?>
                            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                        </a>
                        <ul>
                            <li><a href="<?php echo BASE_URL.'/logout.php';?>" class="logout">Logout</a></li>
                        </ul>
                    </li>
                <?php endif;?>
            </ul>
        </header>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper">

            <!-- Left Sidebar -->
            <div class="left-sidebar">
                <ul>
                    <li><a href="<?php echo BASE_URL.'/posts_index.php';?>">Manage Posts</a></li>
                    <li><a href="<?php echo BASE_URL.'/users_index.php';?>">Manage Users</a></li>
                    <li><a href="<?php echo BASE_URL.'/topics_index.php';?>">Manage Topics</a></li>
                </ul>
            </div>
            <!-- // Left Sidebar -->


            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="posts_create.php" class="btn btn-big">Add Post</a>
                    <a href="posts_index.php" class="btn btn-big">Manage Posts</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Add Posts</h2>

                    <?php include(ROOT_PATH . "/app/helpers/formErrors.php")?>

                    <form action="posts_create.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label>Title</label>
                            <input type="text" name="title" value="<?php echo $title;?>" class="text-input">
                        </div>
                        <div>
                            <label>Body</label>
                            <textarea name="body" id="body"><?php echo $body;?></textarea>
                        </div>
                        <div>
                            <label>Image</label>
                            <input type="file" name="image" class="text-input">
                        </div>
                        <div>
                            <label>Topic</label>
                            <select name="topic_id" class="text-input">
                                <option value=""></option>
                                <?php foreach($topics as $key=>$topic):?>
                                    <?php if(!empty($topic_id)&& $topic_id==$topic['id']):?>
                                        <option selected value="<?php echo $topic['id']?>"><?php echo $topic['name']?></option>
                                    <?php else:?>
                                        <option value="<?php echo $topic['id']?>"><?php echo $topic['name']?></option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div>

                        <?php if(empty($published)):?>
                            <label>
                                <input type="checkbox" name="published">
                                Publish
                            </label>
                        <?php else:?>
                            <label>
                                <input type="checkbox" name="published" checked>
                                Publish
                            </label>
                        <?php endif;?>

                            
                        </div>
                        <div>
                            <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
                        </div>
                    </form>

                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->



        <!-- JQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Ckeditor -->
        <script
            src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
        <!-- Custom Script -->
        <script src="assets/js/scripts.js"></script>

    </body>

</html>