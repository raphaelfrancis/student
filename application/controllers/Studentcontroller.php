<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Studentcontroller extends CI_Controller
{
    public function __constructor()
     {
         parent::__construct();
         $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');

     }

     public function index()
     {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->view('studentregistration');
     }
     public function addstudentdata()
     {
        $studentname = $this->input->post('studentname');
        $studentage = $this->input->post('studentage');
        $studentgender = $this->input->post('studentgender');
        $studentaddress = $this->input->post('studentaddress');
        $studentrollno = $this->input->post('studentrollno');
        echo $studentname;
        exit();            

        //  echo "<script> alert('adasd'); </script>";
        //  exit();
        // $this->load->model('Studentmodel');
        // $this->load->helper(array('form', 'url'));
        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('studentname', 'Studentname', 'required');
        // $this->form_validation->set_rules('studentage', 'Studentage', 'required');
        // $this->form_validation->set_rules('studentgender', 'Studentgender', 'required');
        // $this->form_validation->set_rules('studentaddress', 'Studentaddress', 'required');
        // $this->form_validation->set_rules('studentrollno', 'Studentrollno', 'required');

        if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('studentregistration');
            }
            else
            {
                    
                $error = array();
                $data = array();
                $studentname = $this->input->post('studentname');
                $studentage = $this->input->post('studentage');
                $studentgender = $this->input->post('studentgender');
                $studentaddress = $this->input->post('studentaddress');
                $studentrollno = $this->input->post('studentrollno');
                echo $studentname;
                exit();               
                //validating name
                if(is_numeric(trim(htmlentities($this->input->post('studentname')))))
                {
                        $error["studentname"] = "only Characters allowed";
                }
                else
                {
                        $data['name'] = trim(htmlentities($this->input->post('studentname')));
                        
                }
                //validating name ends
                //validating age
                if(is_numeric(trim(htmlentities($this->input->post('studentage')))))
                {
                    $data['age'] = trim(htmlentities($this->input->post('studentage')));
                    
                }
                else
                {
                    $error["studentage"] = "Please enter a valid  age";
                }
                //validating age ends
                //validating rollno
                if(is_numeric(trim(htmlentities($this->input->post('studentrollno')))))
                {
                    $data['rollno'] = trim(htmlentities($this->input->post('studentrollno')));
                    
                }
                else
                {
                    $error["studentrollno"] = "Please enter a valid Rollno";
                }
                //validating rollno ends

                //validating gender
                if(trim(htmlentities($this->input->post('studentgender'))))
                {
                    $data['gender'] = trim(htmlentities($this->input->post('studentgender')));
                    
                }
                // //validating gender ends
                // validating address
                if(trim(htmlentities($this->input->post('studentaddress'))))
                {
                    $data['address'] = trim(htmlentities($this->input->post('studentaddress')));
                    
                }
                // validating address ends
                if(count($error)>0)
                {
                    $this->load->view('studentregistration',$error);
                    // foreach($error as $key =>$value)
                    // {
                    //     echo $key . "-" . $value . "<br>";
                    // }
                }
                else
                {
                    $addstudentdata = $this->Studentmodel->addstudentdata($data);
                    if($addstudentdata)
                    {
                        echo "submitted successfully";
                        //$this->viewstudentdata();
                    }
                }
                    
            }//else ends
            }//function ends
            public function viewstudentdata()
            {
                $this->load->library('pagination');
                $this->load->helper(array('form', 'url'));
                $this->load->model('Studentmodel');
                
                $config['total_rows'] = $this->Studentmodel->getstudentrows();
                $config['base_url'] = base_url()."index.php/Studentcontroller/viewstudentdata";
                $config['per_page'] = 2;
                $config["uri_segment"] = 3;
                $config['use_page_numbers'] = TRUE;
               

                $this->pagination->initialize($config);
                //$query = $this->Studentmodel->getstudentdata(5,$this->uri->segment(2));
                //  echo $this->uri->segment(1);
                // $data['studentdata'] = null;
                $page = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
                $studentresult = $this->Studentmodel->getstudentdata($config['per_page'],$page);
               if($studentresult){
                $data['studentdata'] =  $studentresult;
                $data["links"] = $this->pagination->create_links();
               }
               $this->load->view('viewstudentdata', $data);
            }//view ends
            //delete student data
            
             public function deletestudentdata()
             {
                $this->load->model('Studentmodel');
                $deleteid = trim(htmlentities($this->input->get('id')));
                $deletearray = array("id"=>$deleteid);
                $deleteresult = $this->Studentmodel->deletestudentdata($deletearray);
                 if($deleteresult)
                 {
                   $this->viewstudentdata();
                 }

             }
             //delete student data ends
             //edit and getting student data
             public function editstudentdata()
             {
                $this->load->helper('form');
                $this->load->model('Studentmodel');
                $editid = trim(htmlentities($this->input->get('id')));
                $editarray = array("id"=>$editid);
                $editresult["studenteditdata"] = $this->Studentmodel->editstudentdata($editarray);
                
                 if($editresult)
                 {
                   $this->load->view('editstudentdata',$editresult);
                 }

             }
             //edit and getting student data ends
             //update student data
             public function updatestudentdata()
            {
               $this->load->model('Studentmodel');
               $this->load->helper(array('form', 'url'));
               $this->load->library('form_validation');
               $this->form_validation->set_rules('studentname', 'Studentname', 'required');
               $this->form_validation->set_rules('studentage', 'Studentage', 'required');
               //$this->form_validation->set_rules('studentgender', 'Studentgender', 'required');
               $this->form_validation->set_rules('studentaddress', 'Studentaddress', 'required');
               $this->form_validation->set_rules('studentrollno', 'Studentrollno', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('studentregistration');
                }
                else
                {
                       
                        $updateerror = array();
                        $updatedata = array();
                        
                        //validating name
                        if(is_numeric(trim(htmlentities($this->input->post('studentname')))))
                        {
                             $updateerror["studentname"] = "only Characters allowed";
                        }
                        else
                        {
                            $updatedata['name'] = trim(htmlentities($this->input->post('studentname')));
                             
                        }
                        //validating name ends
                        //validating age
                        if(is_numeric(trim(htmlentities($this->input->post('studentage')))))
                        {
                            $updatedata['age'] = trim(htmlentities($this->input->post('studentage')));
                            
                        }
                        else
                        {
                            $updateerror["studentage"] = "Please enter a valid  age";
                        }
                        //validating age ends
                        //validating rollno
                        if(is_numeric(trim(htmlentities($this->input->post('studentrollno')))))
                        {
                            $updatedata['rollno'] = trim(htmlentities($this->input->post('studentrollno')));
                            
                        }
                        else
                        {
                            $updateerror["studentrollno"] = "Please enter a valid Rollno";
                        }
                        //validating rollno ends

                        //validating gender
                        if(trim(htmlentities($this->input->post('studentgender'))))
                        {
                            $updatedata['gender'] = trim(htmlentities($this->input->post('studentgender')));
                            
                        }
                        
                        // //validating gender ends
                        // validating address
                        if(trim(htmlentities($this->input->post('studentaddress'))))
                        {
                            $updatedata['address'] = trim(htmlentities($this->input->post('studentaddress')));
                            
                        }
                        // validating address ends
                        if(count($updateerror)>0)
                        {
                            $this->load->view('editstudentdata',$updateerror);
                            
                        }
                        else
                        {
                            $updateid = trim(htmlentities($this->input->post('updateid')));
                            
                            $addstudent = $this->Studentmodel->updatestudentdata($updateid,$updatedata);
                            if($addstudent)
                            {
                                $this->viewstudentdata();
                            }
                        }
                        
                }//else ends
            }//function ends
             public function test()
            {
                
                $studentname = $_POST["studentname"];
                $studentage  = $_POST["studentage"];
                $studentgender = $_POST["studentgender"];
                $studentaddress = $_POST["studentaddress"];
                $studentrollno = $_POST["studentrollno"];
                $data = array();
                $data["studentname"] = $studentname;
                $data["studentage"] = $studentage;
                $data["studentgender"] = $studentgender;
                $data["studentaddress"] = $studentaddress;
                $data["studentrollno"] = $studentrollno;
                echo json_encode($data);
                return json_encode($data);

            }
            
        }//class ends
    

?>