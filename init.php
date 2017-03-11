<?php
session_start();

define('HOST','localhost');
define('DB_NAME','jaguars');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');

require_once 'model/DBHandeller.php' ;
require_once 'model/DBManager.php' ;
// require_once 'model/User.php' ;
// require_once 'model/UserRepo.php' ;
// require_once 'model/Post.php' ;
require_once 'model/Category.php' ;
// require_once 'model/CategoryRepo.php' ;
require_once 'model/Forum.php' ;
require_once 'model/Thread.php' ;
require_once 'model/Comment.php' ;
require_once 'model/User.php' ;

// Handlers
require_once 'model/UserHandeller.php' ;
require_once 'model/CategoryHandeller.php' ;
require_once 'model/ForumHandeller.php' ;
require_once 'model/CommentHandeller.php' ;
require_once 'model/ThreadHandeller.php' ;


?>
