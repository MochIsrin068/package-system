<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Config_m extends CI_Model {
		
		function __construct() {
			
		}
		
		function get_config()
		{
			$data = array();
			
			$result = $this->db->get('config')->result();
			
			foreach($result as $key=> $val)
			{
				$data[$val->name] = $val->value;
			}
			return $data; 
		}
		
		function set_config($data)
		{
			foreach($data as $key=> $val)
			{
				$this->db->where('name',$key);
				$status = $this->db->get('config')->num_rows();
				$this->db->reset_query();
				
				if($status > 0)
				{
					$this->db->where('name',$key);
					$set = array(
					'value' => $val,
					);
					$this->db->update('config',$set);
					$this->db->reset_query();
				}else
				{
					$set = array(
					'name' => $key,
					'value' => $val,
					);
					$this->db->insert('config',$set);
					$this->db->reset_query();
				}
			}
		}
		
		function get_list_driver_reward()
		{
			return $this->db->get('driver_reward')->result();
		}
		
		function add_driver_reward($data)
		{
			$this->db->insert('driver_reward',$data);
		}
		
		function set_active_reward($id,$status)
		{
			$this->db->where('id',$id);
			$this->db->set('status',$status);
			$this->db->update('driver_reward');
		}
		
		function delete_driver_reward($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('driver_reward');
		}
		
		function get_list_company_bank($param)
		{
			$this->db->limit($param['limit']['length'],$param['limit']['start']);
			//$this->db->order_by('bank_perusahaan.date_added','DESC');
			
			$this->db->like("bank_perusahaan.bank_name",$param['search'],'both');
			$this->db->or_like("bank_perusahaan.bank_number",$param['search'],'both');
			$this->db->or_like("bank_perusahaan.name",$param['search'],'both');
			
			return $this->db->get('bank_perusahaan')->result();
		}
		
		function get_total_list_company_bank_filtered($param)
		{
			$this->db->like("bank_perusahaan.bank_name",$param['search'],'both');
			$this->db->or_like("bank_perusahaan.bank_number",$param['search'],'both');
			$this->db->select("count(bank_perusahaan.id) as total");
			return $this->db->get('bank_perusahaan')->result()[0]->total;
		}
		
		function get_total_list_company_bank_unfiltered($param)
		{
			$this->db->select("count(bank_perusahaan.id) as total");
			return $this->db->get('bank_perusahaan')->result()[0]->total;
		}
		
		function add_bank_company($param)
		{
			$this->db->insert('bank_perusahaan',$param);
		}
		
		function delete_bank_company($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('bank_perusahaan');
		}
		
		function get_list_admin($param)
		{
			$this->db->limit($param['limit']['length'],$param['limit']['start']);
			//$this->db->order_by('ppob_payment_product.date_added','DESC');
			
			$this->db->like("admin.email",$param['search'],'both');
			$this->db->or_like('admin_role.role',$param['search'],'both');
			$this->db->join('admin_role','admin_role.id = admin.role','left');
			$this->db->select('admin.id,admin.email,admin.ip_addr,admin.role,admin_role.role as role_name, admin.status');
			return $this->db->get('admin')->result();
		}
		
		function get_total_list_admin_filtered($param)
		{
			$this->db->like("admin.email",$param['search'],'both');
			$this->db->or_like('admin_role.role',$param['search'],'both');
			$this->db->join('admin_role','admin_role.id = admin.role','left');
			$this->db->select("count(admin.id) as total");
			return $this->db->get('admin')->result()[0]->total;
		}
		
		function get_total_list_admin_unfiltered($param)
		{
			$this->db->select("count(admin.id) as total");
			return $this->db->get('admin')->result()[0]->total;
		}
		
		function get_admin_roles()
		{
			return $this->db->get('admin_role')->result();
		}
		
		function get_admin_role($role)
		{
			$this->db->where('id',$role);
			return $this->db->get('admin_role')->row();
		}
		
		function admin_add($param)
		{
			$this->db->insert('admin',$param);
		}
		
		function get_admin($id)
		{
			$this->db->where('id',$id);
			$this->db->select('id,nik,email,ip_addr,role,status');
			return $this->db->get('admin')->row();
		}
		
		function admin_edit($param,$id)
		{
			$this->db->where('id',$id);
			$this->db->update('admin',$param);
		}
		
		function admin_delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('admin');
		}
		
		function get_list_customer_cancel_reason($param)
		{
			$this->db->limit($param['limit']['length'],$param['limit']['start']);
			//$this->db->order_by('bank_perusahaan.date_added','DESC');
			
			$this->db->like("customer_cancel_reason.reason",$param['search'],'both');
			return $this->db->get('customer_cancel_reason')->result();
		}
		
		function get_total_list_customer_cancel_reason_filtered($param)
		{
			$this->db->like("customer_cancel_reason.reason",$param['search'],'both');
			
			$this->db->select("count(customer_cancel_reason.id) as total");
			return $this->db->get('customer_cancel_reason')->result()[0]->total;
		}
		
		function get_total_list_customer_cancel_reason_unfiltered($param)
		{
			$this->db->select("count(customer_cancel_reason.id) as total");
			return $this->db->get('customer_cancel_reason')->result()[0]->total;
		}
		
		function add_cancel_reason_customer($param)
		{
			$this->db->insert('customer_cancel_reason',$param);
		}
		
		function delete_cancel_reason_customer($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('customer_cancel_reason');
		}
		
		function get_version_app_customer()
		{
			$this->db->where('application',0);
			return $this->db->get('app_versions')->row();
		}
		
		function get_version_app_driver()
		{
			$this->db->where('application',1);
			return $this->db->get('app_versions')->row();
		}
		
		function set_version_app($data)
		{
			$this->db->update_batch('app_versions', $data, 'application');
		}
	}
	
?>
