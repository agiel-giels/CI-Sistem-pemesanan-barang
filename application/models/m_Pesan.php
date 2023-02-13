<?php
class m_Pesan extends CI_Model{

    function get(){
        return $this->db->get('pesan');
    }

    function get_checkout(){
        $this->db->select('*');
        $this->db->from('pesan');
        $this->db->where('status_pesan', 1);
        $this->db->join('user', 'user.id = pesan.id', 'left');

        return $this->db->get()->result_array();
    }

    function get_diproses(){
        $this->db->select('*');
        $this->db->from('pesan');
        $this->db->where('status_pesan >', 1);
        $this->db->join('user', 'user.id = pesan.id', 'left');

        return $this->db->get()->result_array();
    }

    function getDistict($id){
        $this->db->distinct();
        $this->db->select('id_pesanan');
        $this->db->where('id', $id);

        $id_pesanan = $this->db->get('pesan')->result_array();

        $i = 0;
        $pesanan = [];
        foreach ($id_pesanan as $id) {
            var_dump($id);
            $pesanan[$i] =  $this->m_Barang->getbyidpesan($id['id_pesanan']);
            $i++;
        }

        var_dump($pesanan);die;

        $i = 0;
        $data1 = [];
        foreach ($pesanan as $data) {
            if ($data['status_pesan'] == 'Dalam Proses') {
                $data1[$i] = $data['id_pesanan'];
                $i++;
            }
        }
        var_dump($data1);die;
        return $data1;
    }

    function getMax(){
        $this->db->select_max('id_pesanan');

        return $this->db->get('pesan')->result_array();
    }

    function input_data($data){
        $this->db->insert('barang',$data);

        return $this->db->insert_id();
    }

    function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }

    function update_data($data,$id_barang){
        $this->db->where('id_barang',$id_barang);
		return $this->db->update('pesan',$data);
    }

    
    public function duatabel($id){
        $this->db->select('*');
        $this->db->from('pesan'); 
        $this->db->join('user', 'user.id=pesan.id');
        // $this->db->where('id_pesan',$id_pesan);
        $this->db->where('user.id',$id);
        $this->db->order_by('user.id');
        $query = $this->db->get(); 
        return $query->result();
    }

    public function get_keranjang_aktif($id){
        $this->db->where('id', $id);
        $this->db->where('id', $id);

        return $this->db->get('pesan')->result_array();

    }

    public function get_keranjang($id){
        $this->db->where('id', $id);

        return $this->db->get('pesan')->result_array();

    }

    public function cek_pesan_aktif(){
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->where('status_pesan', 0);

        $cek = $this->db->get('pesan')->result_array();

        if($cek){
            return $cek[0]['id_pesan'];
        }else{
            return false;
        }
    }

    public function buat_baru(){
        $data = array(
            'id' => $this->session->userdata('id'),
            'status_pesan' => 0,
        );

        $this->db->insert('pesan',$data);

        return $this->db->insert_id();
    }

     public function get_byid($id){
      $this->db->where('id', $id);

      return $this->db->get('pesan')->result_array();
  }

  public function checkout($id_pesan){
    $this->db->where('status_pesan','0');

    $data = array(
        'status_pesan' => 1
    );

    return $this->db->update('pesan', $data);
  }

  public function prosesPesanan($id_pesan){
    $this->db->where('id_pesan', $id_pesan);

    $data = array(
        'status_pesan' => 2,
    );

    return $this->db->update('pesan', $data);
  }

  public function kirimPesanan($id_pesan){
    $this->db->where('id_pesan', $id_pesan);

    $data = array(
        'status_pesan' => 3,
    );

    return $this->db->update('pesan', $data);
  }

  public function selesaiPesanan($id_pesan){
    $this->db->where('id_pesan', $id_pesan);

    $data = array(
        'status_pesan' => 4,
    );

    return $this->db->update('pesan', $data);
  }

  public function pembatalanPesanan($id_pesan){
    $this->db->where('status_pesan','1');
    $data = array(
        'status_pesan' => 5
    );

    return $this->db->update('pesan', $data);
  }
  
  public function hitungJumlahDataPesan()
{   
    $query = $this->db->get('pesan');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}


}
?>