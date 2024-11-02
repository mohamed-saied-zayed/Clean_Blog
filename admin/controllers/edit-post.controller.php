<?php

$id = $_GET['id'];
$edit_data = get_row_by_id('posts',$id);
require_once admin_view("posts/edit");
