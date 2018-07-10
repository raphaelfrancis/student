<?php
class Studentmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function addstudentdata($data)
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d H:i:s");
        $data["created"] = $date;
        $this->load->database();
        $addresult = $this->db->insert('studentdata',$data);
        return $addresult;
    }
    public function getstudentdata($limit,$offset)
    {
         $this->load->database();
         $this->db->SELECT("*");
         $this->db->FROM('studentdata');
         $this->db->LIMIT($limit,$offset);
         $query = $this->db->get();    
         return $query->result_array();
         
  

    }
    public function deletestudentdata($deletearray)
    {
        $deleteid = $deletearray["id"];
        $this->db->WHERE('id',$deleteid);
        $qu = $this->db->DELETE('studentdata');
        return $qu;

    }
    public function editstudentdata($editarray)
    {
        $editid = $editarray["id"];
        $this->db->select('*');
        $this->db->where('id',$editid);
        $q = $this->db->get('studentdata');
        return $q->result_array();
        echo($data['age']);

    }
    public function updatestudentdata($updateid,$updatedata)
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d H:i:s");
        $updatedata["updated"] = $date;
        $this->db->where('id', $updateid);
        $updatedata =  $this->db->update('studentdata', $updatedata);
        if($updatedata)
        {
            return $updatedata;
        }

    }
    public function getstudentrows()
    {
        $numberofrows = $this->db->count_all_results('studentdata');
        return $numberofrows;
    }
    
}