<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Api extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where("member", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("member")->result();
        }
     
        $this->response(["200" => "聯絡人資料載入正常", 'data' => $data], REST_Controller::HTTP_OK);

        if($data == null){
            $this->response(["404" => "操作錯誤，查無此資料!"], REST_Controller::HTTP_OK);
        }
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('member',$input);
     
        $this->response(['資料新增成功!'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
            $input = $this->put();
            $this->db->update('member', $input, array('id'=>$id));
            $this->response(['資料修改成功!'], REST_Controller::HTTP_OK);
       
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('member', array('id'=>$id));
       
        $this->response(['資料刪除成功!'], REST_Controller::HTTP_OK);
    }
    	
}