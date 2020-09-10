<?php

class CustomModel extends ci_model
{
    public function getREquiredDocuments($id = null){
        $query =  "SELECT * FROM required_documents where id IN ($id)";
        $q = $this->db->query($query)->result_array();
		return $this->db->affected_rows() ? $q : array();
	}


}
