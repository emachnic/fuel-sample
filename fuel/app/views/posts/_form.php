<?php echo Form::open(); ?>
	<p>
		<?php echo Form::label('Title', 'title'); ?>
<?php echo Form::input('title', Input::post('title', isset($post) ? $post->title : '')); ?>
	</p>
	<p>
		<?php echo Form::label('Summary', 'summary'); ?>
<?php echo Form::input('summary', Input::post('summary', isset($post) ? $post->summary : '')); ?>
	</p>
	<p>
		<?php echo Form::label('Body', 'body'); ?>
<?php echo Form::textarea('body', Input::post('body', isset($post) ? $post->body : ''), array('cols' => 60, 'rows' => 8)); ?>
	</p>

	<div class="actions">
		<?php echo Form::submit(); ?>	</div>

<?php echo Form::close(); ?>