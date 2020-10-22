<?php

class CustomModel extends ci_model
{
    public function getREquiredDocuments($id = null)
    {
        $query =  "SELECT * FROM required_documents where id IN ($id)";
        $q = $this->db->query($query)->result_array();
        return $this->db->affected_rows() ? $q : array();
    }

    public function getAllUserServices()
    {
        $query = "SELECT services.service_name ,users.user_id,users.name,users.email,users.contact_no,user_services.service_id,user_services.package,user_services.price,user_services.status FROM user_services LEFT JOIN users ON users.user_id = user_services.user_id LEFT JOIN services ON user_services.service_id = services.serviceId";
        $q = $this->db->query($query)->result_array();
        return $this->db->affected_rows() ? $q : array();
    }
}
