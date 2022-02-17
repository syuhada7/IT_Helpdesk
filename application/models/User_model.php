<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function login($post)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username', $post['username']);
    $this->db->where('password', md5($post['password']));
    $query = $this->db->get();
    return $query;
  }

  public function get($id = null)
  {
    $this->db->from('user');
    if ($id != null) {
      $this->db->where('id_user', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params['username'] = $post['username'];
    $params['password'] = md5($post['password1']);
    $params['email'] = $post['email'];
    $params['divisi'] = $post['divisi'];
    $params['level'] = $post['level'];
    $params['image'] = 'default.png';
    $this->db->insert('user', $params);
  }

  public function regis($post)
  {
    $params['username'] = $post['username'];
    $params['password'] = md5($post['password1']);
    $params['email'] = $post['email'];
    $params['divisi'] = $post['divisi'];
    $params['image'] = 'default.png';
    $this->db->insert('user', $params);
  }

  public function edit($post)
  {
    $params['username'] = $post['username'];
    if (!empty($post['password1'])) {
      $params['password'] = md5($post['password1']);
    }
    $params['email'] = $post['email'];
    $params['divisi'] = $post['divisi'];
    $params['level'] = $post['level'];
    $this->db->where('id_user', $post['id_user']);
    $this->db->update('user', $params);
  }

  public function forgot($post)
  {
    $params['username'] = $post['username'];
    if (!empty($post['password1'])) {
      $params['password'] = md5($post['password1']);
    }
    $this->db->where('username', $post['username']);
    $this->db->update('user', $params);
  }

  public function delete($where)
  {
    $this->db->where($where);
    $this->db->delete('user');
  }
}
