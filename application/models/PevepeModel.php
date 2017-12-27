<?php 

class PevepeModel extends CI_Model {

    function getFriend($id) {
        $this->db->select('a.id_user ida, a.photo_url photo_urla, a.name namea, b.id_user idb, b.photo_url photo_urlb, b.name nameb');
        $this->db->from('friend f'); 
        $this->db->join('user a', 'a.id_user=f.ida', 'inner');
        $this->db->join('user b', 'b.id_user=f.idb', 'inner');
        $this->db->where('f.ida', $id);
        $this->db->or_where('f.idb', $id);  
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query;
        }
        else
        {
            return false;
        }
    }

    function getStats($id){
        $this->db->select('s.*, a.id_user, a.name, a.photo_url');
        $this->db->from('stats s'); 
        $this->db->join('user a', 'a.id_user=s.id_user', 'inner');
        $this->db->where('s.id_user', $id);
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query;
        }
        else
        {
            return false;
        }
    }
}