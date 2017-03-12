<div class="col-xs-3">
	<div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="index.php">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="categories.php">Categories</a>
            </li>
            <li>
                <a href="forums.php">Forums</a>
            </li>

            <li>
                <a href="threads.php">Threads</a>
            </li>
            <li>
                <a href="users.php">Users</a>
            </li>
            <li >

                <a href="index.php?lock=1">
										<?php echo file_exists('../lock') ? "UNLOCK": "LOCK"; ?>
										WEBSITE!
								</a>
            </li>

        </ul>
    </div>
</div>
