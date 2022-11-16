<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProduct extends CI_Model
{
    public function getProduct()
    {
      $this->db->select('product.*, category.*');
      $this->db->from('product');
      $this->db->join('category', 'category.id = product.id_category', 'inner');
      return $this->db->get('')->result_array();
    }
    
    public function getCategory()
    {
       return $this->db->get('category')->result();
    }

    public function getCategoryByName($where = null)
    {
      return $this->db->get_where('category', $where)->result_array();
    }

    public function createProduct($data = null)
    {
       return $this->db->insert('product', $data);
    }

    public function createCategory($data = null)
    {
      return $this->db->insert('category', $data);
    }

    public function deleteCategory($data)
    {
      $this->db->where('id', $data);
      $query = $this->db->get('category')->result();
      if (!empty($query)){
        $this->db->where('id', $data);
        return $this->db->delete('category');
      } else{
        return False;
      }
    }
    public function deleteProduct($data)
    {
      $this->db->where('id', $data);
      $query = $this->db->get('product')->result();
      if (!empty($query)){
        $this->db->where('id', $data);
        return $this->db->delete('product');
      } else{
        return False;
      }
    }

    
}
