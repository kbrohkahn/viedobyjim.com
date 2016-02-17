<?php
class Video_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_videos($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('videos');
			return $query->result_array();
		}

		$query = $this->db->get_where('videos', array('slug' => $slug));
		return $query->row_array();
	}

	public function set_videos()
	{
		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'link' => $this->input->post('link'),
			'text' => $this->input->post('text')
		);

		return $this->db->insert('videos', $data);
	}
}