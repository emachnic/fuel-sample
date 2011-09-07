<?php
class Controller_Posts extends Controller_Template {
	
	public function action_index()
	{
		$data['posts'] = Model_Post::find('all');
		$this->template->title = "Posts";
		$this->template->content = View::factory('posts/index', $data);

	}
	
	public function action_view($id = null)
	{
		$data['post'] = Model_Post::find($id);
		
		$this->template->title = "Post";
		$this->template->content = View::factory('posts/view', $data);

	}
	
	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$post = Model_Post::factory(array(
				'title' => Input::post('title'),
				'summary' => Input::post('summary'),
				'body' => Input::post('body'),
			));

			if ($post and $post->save())
			{
				Session::set_flash('notice', 'Added post #' . $post->id . '.');

				Response::redirect('posts');
			}

			else
			{
				Session::set_flash('notice', 'Could not save post.');
			}
		}

		$this->template->title = "Posts";
		$this->template->content = View::factory('posts/create');

	}
	
	public function action_edit($id = null)
	{
		$post = Model_Post::find($id);

		if (Input::method() == 'POST')
		{
			$post->title = Input::post('title');
			$post->summary = Input::post('summary');
			$post->body = Input::post('body');

			if ($post->save())
			{
				Session::set_flash('notice', 'Updated post #' . $id);

				Response::redirect('posts');
			}

			else
			{
				Session::set_flash('notice', 'Could not update post #' . $id);
			}
		}
		
		else
		{
			$this->template->set_global('post', $post, false);
		}
		
		$this->template->title = "Posts";
		$this->template->content = View::factory('posts/edit');

	}
	
	public function action_delete($id = null)
	{
		if ($post = Model_Post::find($id))
		{
			$post->delete();
			
			Session::set_flash('notice', 'Deleted post #' . $id);
		}

		else
		{
			Session::set_flash('notice', 'Could not delete post #' . $id);
		}

		Response::redirect('posts');

	}
	
	
}

/* End of file posts.php */
