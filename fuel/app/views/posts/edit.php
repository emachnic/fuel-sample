<h2 class="first">Editing Post</h2>

<?php echo render('posts/_form'); ?>
<br />
<p>
<?php echo Html::anchor('posts/view/'.$post->id, 'View'); ?> |
<?php echo Html::anchor('posts', 'Back'); ?></p>
