<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_models extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function add_entry($table,$data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function get_entries() {
        $query = $this->db->get('employee');
        return $query->result();
    }
    public function update_entry($table,$data,$where) {
        $this->db->where($where);
        $qyer=$this->db->update("$table", $data);
		return $qyer;
    }
    public function get_entry($table,$where=null,$orderby=null,$order=null,$limit=null) {
        if($where)
        {
           $this->db->where($where); 
        }
        
        if($orderby)
        {
            $this->db->order_by($orderby, $order);
        }
        if($limit)
        {
            $this->db->limit($limit);
        }
        
        $query = $this->db->get($table);
		if($query->num_rows())
		{
			return $query->result_array();
		}
		else 
		{
			return array();
		}
    }
    public function delete_entry($table,$where) {
        return $this->db->delete($table,$where);
    }
	public function child_trees($user_id)
	{
		$sel22="select * from users_tbl where id='$user_id'";
        $run1=$this->db->query($sel22);
        $rowsss=$run1->row_array();
		echo '<ul>';
		echo "<li> <a href='#'><span><i class='fas fa-user'></i></span> ".$rowsss['f_name']." ".$rowsss['l_name']."</a>";
		$sel="select * from users_tbl where parent_id='$user_id'";
        $run=$this->db->query($sel);
        if ($run->num_rows()) {
		$rr_result=$run->result_array();
		echo  '<ul>';
		$htmls='';
		foreach($rr_result as $nrow)
		{
			$htmls.="<li> <a href='#'><span><i class='fas fa-user'></i></span> ".$nrow['f_name']." ".$nrow['l_name']."</a>";
			$htmls.=$this->Common_models->inner_child($nrow['id']);
			$htmls.="</li>";
		}
		echo $htmls;
		echo '</ul>';
		}
		echo '</li></ul>';
	}
	public function inner_child($user_id)
	{
		$sel="select * from users_tbl where parent_id='$user_id'";
        $run=$this->db->query($sel);
		$htmls='';
        if ($run->num_rows()) {
		$rr_result=$run->result_array();
		
		$htmls='<ul>';
		foreach($rr_result as $nrow)
		{
			$htmls.="<li> <a href='#'><span><i class='fas fa-user'></i></span> ".$nrow['f_name']." ".$nrow['l_name']."</a></li>";
		}
		
		$htmls.='</ul>';
		}
		return $htmls;
	}
    public function drawMenu ($listOfItems,$i) {
    echo "<ul>";
        foreach ($listOfItems as $item) {
            $sel22="select * from users_tbl where id='$item'";
            $run1=$this->db->query($sel22);
            $rowsss=$run1->row_array();
            echo "<li> <a href='#'><span><i class='fas fa-user'></i></span> ".$rowsss['f_name']." ".$rowsss['l_name']."</a>";
            $sel="select * from users_tbl where parent_id='$item'";
            $run=$this->db->query($sel);
            if ($run->num_rows()) {

                $rows=$run->result_array();
                $un_array=array();
                foreach($rows as $nval)
                {
                    $i++;
                    $un_array[]=$nval['id'];
                }
                
                $this->drawMenu($un_array,$i);
                 // here is the recursion
            }
            echo "</li>";
        }
    echo "</ul>";
    }
    function get_six_child($user_id)
    {
        $sel="select * from users_tbl where parent_id='$user_id'";
        $runs=$this->db->query($sel);
        $resl=$runs->result_array();
        $members=array();
        foreach($resl as $vals)
        {
            $members[]=$vals;
            $sel1="select * from users_tbl where parent_id='".$vals['id']."'";
            $runs1=$this->db->query($sel1);
            $resl1=$runs1->result_array();
            foreach($resl1 as $vals1)
            {
                $members[]=$vals1;
            }
        }
        return $members;
    }
	function cal_level($amount)
	{
		$ress=$this->Common_models->get_entry('level_table','','level','ASC');
		$levels=0;
		foreach($ress as $vals)
		{
			if($amount>=$vals['amounts'])
			{
				$levels=$vals['level'];
			}
		}
		return $levels;
	}
    function send_mails($toz,$sub,$body)
    {
        $to =$toz;  
        $from = "support@inceptial.in";
        $headers ="From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1 \n";
        $subject =$sub;
        $msg = '<body style="margin:0px;">                      <table style="background-color:#f8f8f8;border-collapse:collapse!important;width:100%;border-spacing:0" width="100%" bgcolor="#f8f8f8">                  <tbody>                 <tr>                    <td style="border-collapse:collapse;font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px;vertical-align:top;padding:0" valign="top">                  </td>                   <td  style="border-collapse:collapse;font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px;vertical-align:top;background:#ffffff;display:block;margin:0 auto!important;max-width:600px;width:600px;padding:0" width="600" valign="top">                    <div style="display:block;margin:0 auto;max-width:600px;padding:0;background:#ffffff">                  <div>                   <table style="border-collapse:collapse!important;width:100%;border-spacing:0" width="100%">                 <tbody>                 <tr>                    <td style="border-collapse:collapse;font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px;vertical-align:top;padding:10px 0 10px 0;color:#ffffff;margin-top:20px;width:100%;border-bottom:none;background-color:#373435;margin-bottom:30px" width="100%" valign="top" bgcolor="#f8f8f8">                   <table style="border-collapse:collapse!important;width:100%;border-spacing:0" width="100%">                 <tbody>                 <tr>                    <td style="border-collapse:collapse;font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px;vertical-align:top;padding:0;color:#000000" valign="top" align="center">                 <img src="'.base_url('assets/') .'img/logo.png" style="max-width:100%;width:78px;margin:6px 0 0 21px;" width="140"></td>                   <td style="border-collapse:collapse;font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px;vertical-align:top;padding:0;color:#000000" valign="top" align="right"> </td>                    </tr>                   </tbody>                    </table>                    </td>                   </tr>                   <tr>                    <td style="border-collapse:collapse;font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px;vertical-align:top;padding:0" valign="top">  <table style="border-collapse:collapse!important;width:100%;border-spacing:0" width="100%">                 <tbody>                 <tr>                    <td style="border-collapse:collapse;font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px;vertical-align:top;padding:30px" valign="top">'.$body.'
                                        <br>
                                        <p>Thank You: <br><b>Inceptial</b></p>
                                        </td>                   </tr>                   </tbody>                    </table>                                </td>                   </tr>                   </tbody>                    </table>                    </div>                  <table style="border-collapse:collapse!important;width:100%;border-spacing:0" width="100%">                 <tbody>                 <tr style="display:block;margin:0 auto; background:#373435;color:#ffffff;margin-top:20px;font-size:16px"><td style="width:100%"><p style="text-align: center;padding-top: 12px;">Inceptial © 2020</p>  </td>               <td style="border-collapse:collapse;font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px;vertical-align:top;padding:0;width:50%" width="50%" valign="top">                    <table style="border-collapse:collapse!important;width:100%;border-spacing:0" width="100%">                 <tbody>                             <tr><td></td></tr>      </tbody>                    </table>                    </td>                   </tr>                   </tbody>                    </table>                    </div>                  </td>                   <td style="border-collapse:collapse;font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:14px;vertical-align:top;padding:0" valign="top">                  </td>                   </tr>                   </tbody>                    </table>                    </body>';
        mail($to,$subject,$msg,$headers);
        return 1;
    }
}
?>