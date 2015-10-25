<?php 
/**
* Categories_Model
*/
class Categories_Model extends CI_Model
{
	
	function get_categories_list($cat_id) {

		if ($cat_id <= 0 || $cat_id == null) {
			$cat_id = "node.parent_id = '0'";
			$query = $this->db->query('SELECT node.name ,node.cat_link,node.id, node.description, (COUNT( parent.name ) - ( sub_tree.depth +1 )) AS depth FROM categories AS node, categories AS parent, categories AS sub_parent, (SELECT node.id, (COUNT( parent.id ) -1) AS depth FROM categories AS node, categories AS parent WHERE node.left_node BETWEEN parent.left_node AND parent.right_node AND '.$cat_id.' GROUP BY node.id ORDER BY node.left_node) AS sub_tree WHERE node.left_node BETWEEN parent.left_node AND parent.right_node AND node.left_node BETWEEN sub_parent.left_node AND sub_parent.right_node AND sub_parent.id = sub_tree.id GROUP BY node.id HAVING depth < 1 ORDER BY node.left_node');
		} else {
			$cat_id = "node.id = '".$cat_id."'";
			$query = $this->db->query('SELECT node.name ,node.cat_link,node.id, node.description, (COUNT( parent.name ) - ( sub_tree.depth +1 )) AS depth FROM categories AS node, categories AS parent, categories AS sub_parent, (SELECT node.id, (COUNT( parent.id ) -1) AS depth FROM categories AS node, categories AS parent WHERE node.left_node BETWEEN parent.left_node AND parent.right_node AND '.$cat_id.' GROUP BY node.id ORDER BY node.left_node) AS sub_tree WHERE node.left_node BETWEEN parent.left_node AND parent.right_node AND node.left_node BETWEEN sub_parent.left_node AND sub_parent.right_node AND sub_parent.id = sub_tree.id GROUP BY node.id HAVING depth = 1 ORDER BY node.left_node');
		}
		// $query_string = 'SELECT node.name ,node.cat_link,node.id, node.description, (COUNT( parent.name ) - ( sub_tree.depth +1 )) AS depth FROM categories AS node, categories AS parent, categories AS sub_parent, (SELECT node.id, (COUNT( parent.id ) -1) AS depth FROM categories AS node, categories AS parent WHERE node.left_node BETWEEN parent.left_node AND parent.right_node AND '.$cat_id.' GROUP BY node.id ORDER BY node.left_node) AS sub_tree WHERE node.left_node BETWEEN parent.left_node AND parent.right_node AND node.left_node BETWEEN sub_parent.left_node AND sub_parent.right_node AND sub_parent.id = sub_tree.id GROUP BY node.id HAVING depth = 1 ORDER BY node.left_node';
		// var_dump($query_string);
		// exit;
		if ($query->num_rows()>0) {

			return $result = $query->result();
		}
	}
}
?>