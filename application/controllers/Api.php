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
            $data = $this->db->get_where("member", ['id' => $id])->row_array();//如果是鍵入id會顯示一列聯絡人資料
        }else{
            $data = $this->db->get("member")->result(); //否則是顯示全部聯絡人資料
        }
     
        $this->response(["200" => "資料載入成功!",'data' => $data], REST_Controller::HTTP_OK);

        if($data == null){
            $this->response(["404" => "無任何資料!"], REST_Controller::HTTP_OK);
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
     
        $this->response(["200" => "資料新增成功!"], REST_Controller::HTTP_OK);
        
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
            $this->response(["200"=>"資料修改成功!"], REST_Controller::HTTP_OK);
       
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        
        $this->db->delete('member', array('id'=>$id));
       
        $this->response(["200"=>"資料刪除成功!"], REST_Controller::HTTP_OK);
    }
    	
}