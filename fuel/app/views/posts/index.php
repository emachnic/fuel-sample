<h2 class="first">Listing Posts</h2>

<table cellspacing="0">
	<tr>
		<th>Title</th>
		<th>Summary</th>
		<th>Body</th>
		<th></th>
	</tr>

	<?php foreach ($posts as $post): ?>	<tr>

		<td><?php echo $post->title; ?></td>
		<td><?php echo $post->summary; ?></td>
		<td><?php echo $post->body; ?></td>
		<td>
			<?php echo Html::anchor('posts/view/'.$post->id, 'View'); ?> |
			<?php echo Html::anchor('posts/edit/'.$post->id, 'Edit'); ?> |
			<?php echo Html::anchor('posts/delete/'.$post->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>		</td>
	</tr>
	<?php endforeach; ?></table>

<br />

<?php echo Html::anchor('posts/create', 'Add new Post'); ?>