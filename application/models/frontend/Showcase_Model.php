<?php 
/**
* frontend - showcase_model
*/
class Showcase_Model extends CI_Model
{
	
	function get_showcase_homepage() {
		/* SELECT 
		showcase.id, showcase.title, showcase.content, showcase.show_home_page, showcase.themes_area_id, 
		blog_to_showcase.blog_id, blog_to_showcase.blog_frame, blog_to_showcase.blog_views, 
		blog.pages_link, blog.perma_link, blog.title AS blog_title, blog.content AS blog_content 
		FROM showcase 
		LEFT JOIN blog_to_showcase 
		ON showcase.id = blog_to_showcase.showcase_id 
		LEFT JOIN blog 
		ON blog.id = blog_to_showcase.blog_id 
		WHERE showcase.show_home_page = 1*/
		// sadece anasayfaya ait olan vitrinlerin gelmesi bu vitrinlere ait bloglar
		$this->db->select('showcase.id, showcase.title, showcase.content, showcase.show_home_page, showcase.themes_area_id');
		$this->db->from('showcase');
		$this->db->where('showcase.show_home_page',1);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}

	function get_blog_to_showcase($showcase_id = null) {
		$this->db->select('blog_id,blog_views');
		if ($showcase_id != null) {
			$this->db->where('showcase_id',$showcase_id);
		}
		$query = $this->db->get('blog_to_showcase');
		if ($query->num_rows()>0) {
			return $result = $query->result();
		}
	}
}
?>