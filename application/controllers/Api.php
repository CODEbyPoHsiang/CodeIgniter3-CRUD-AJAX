<?php
   
   defined('BASEPATH') OR exit('No direct script access allowed');

   use chriskacerguis\RestServer\RestController;


     
class Api extends RestController {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
        //跨域開始
       header('Access-Control-Allow-Origin: *');
       header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
       header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
       $method = $_SERVER['REQUEST_METHOD'];
       if ($method == "OPTIONS") {
           die();
       }
       
       $this->load->model('Member_model');

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
     
        $this->response(["200" => "資料載入成功!",'data' => $data], RestController::HTTP_OK);

        if($data == null){
            $this->response(["404" => "無任何資料!"], RestController::HTTP_OK);
        }
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->post();
        $this->db->insert('member',$input);
        // echo json_encode($input);
        $this->response(["200" => "資料新增成功!"], RestController::HTTP_OK);
        
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
            $this->response(["200"=>"資料修改成功!"], RestController::HTTP_OK);
       
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        
        $this->db->delete('member', array('id'=>$id));
       
        $this->response(["200"=>"資料刪除成功!"], RestController::HTTP_OK);
    }
    	
}