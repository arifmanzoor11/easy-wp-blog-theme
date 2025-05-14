<?php
if (post_password_required()) return;
if (have_comments()) :
    wp_list_comments();
endif;
comment_form();
