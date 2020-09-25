<?php
class latLongControl extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('getLatLong');
    }

    function index()
    {

        $results = $this->getLatLong->get();
        $count = 0;

        foreach($results->result() as $row)
        {
            $data['latlong'][$count]['lat'] = $row->lat;
            $data['latlong'][$count]['lng'] = $row->lng;
            $count++;
        }
        $data['v_map']=$count;

       $this->load->view('v_map',$data);
    }

    function load_test($data)
    {
        $this->load->view('v_map',$data);
    }

}
?>