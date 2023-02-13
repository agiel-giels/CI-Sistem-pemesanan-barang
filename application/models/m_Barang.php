<?php
class m_Barang extends CI_Model{
    public function __construct(){
      $this->load->database();
      $this->load->library('encryption');
    }

    public function get(){   
      return $this->db->get("barang");
    }

    public function getBarang(){
      // $this->db->where('id_pesan'.$id_pesan);

      return $this->db->get('barang')->result_array();
    }

    public function databarang($id_pesan)
      {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id_pesan', $id_pesan);
        
        $this->db->order_by('id_pesan','ASC');
        $query = $this->db->get();
        return $query->result();
     }
    //   $this->db->select('*');
    //   $this->db->from('barang as p');
    //   $this->db->where('p.id_pesan', $where);

    //   $this->db->order_by('p.id_pesan','ASC');
    //   return $query = $this->db->get();
    // }

  public function updateBarang($id_barang,$data){
    $this->db->where('id_barang',$id_barang);
    return $this->db->update('barang',$data);
}

function input_data($data){
  $this->db->insert('barang',$data);
  return $this->db->insert_id();
}

public function duatabel(){
  $this->db->select('*');
  $this->db->from('barang'); 
  $this->db->join('pesan', 'pesan.id_pesan=barang.id_pesan');
  // $this->db->where('id_pesan',$id_pesan);
  // $this->db->where('status_pesan',$id_pesan);
  $this->db->where('status_pesan','Dalam Proses');
  $query = $this->db->get(); 
  return $query->result();
}

public function getStatusPesan(){
  $this->db->select('*');
  $this->db->from('barang'); 
  $this->db->join('pesan', 'pesan.id_pesan=barang.id_pesan');
  // $this->db->where('id_pesan',$id_pesan);
  // $this->db->where('status_pesan',$id_pesan);
  $this->db->where('status_pesan !=' ,'Dalam Proses');
  $query = $this->db->get(); 
  return $query->result();
}

  

  public function getDataById($id_barang){
		$this->db->select("*");
		$this->db->from("barang");
    $this->db->where('id_barang');
		$data = $this->db->get();
		return $data->result_array();	
	}

    
    

    // public function tambahUser($data){
    //     return $this->db->insert("barang",$data);
    // }

    public function hapusBarang($id_barang){
      $this->db->where('id_barang',$id_barang);
      return $this->db->delete('barang');
	}

  public function getbyidpesan($id_barang){
      $this->db->where('id_barang', $id_barang);

      return $this->db->get('barang')->result_array();
  }

  public function get_byid($id){
      $this->db->where('id', $id);

      return $this->db->get('barang')->result_array();
  }

  public function get_byPesanan($id_pesanan){
      $this->db->where('id_pesanan', $id_pesanan);

      return $this->db->get('barang')->result_array();
  }


  public function get_pesanan($id_pesanan){
    $this->db->select("*");
    $this->db->from('barang');
    $this->db->join('pesan', 'barang.id_pesanan = pesan.id_pesan');
    $this->db->where('id_pesanan',$id_pesanan);
    $data = $this->db->get();
    return $data->result_array();

  }

  public function get_pesan($id_pesanan){

    $this->db->select("*");
    $this->db->from('barang');
    $this->db->join('pesan', 'barang.id_pesanan = pesan.id_pesan');
    $this->db->where('id_pesanan', $id_pesanan);

    return $this->db->get('barang')->result_array();

  }


  public function confirm_pesanan($id_barang){
    $data = array(
      'tersedia' => 1,
    );

    $this->db->where('id_barang', $id_barang);

    return $this->db->update('barang', $data);
  }
  
  public function batalkan_pesanan($id_barang){
    $data = array(
      'tersedia' => 2,
    );

    $this->db->where('id_barang', $id_barang);

    return $this->db->update('barang', $data);
  }

  public function hitungJumlahDataBarang(){   
    $query = $this->db->get('barang');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }

    function cek_kirim($id_pesan){
      $this->db->where('id_pesan', $id_pesan);
  
      $barang =  $this->db->get('barang')->result_array();
  
      $cek = false;
      foreach ($barang as $barang) {
        if ($barang['tersedia'] == 0) {
          $cek = true;
        }
      }
      
      return $cek;
    }
}
public function get_Laporan(){
  $this->db->select('*');
  $this->db->from('barang');
  $this->db->join('pesan', 'barang.id_barang = pesan.id_pesan');
  $this->db->join('user', 'barang.id = user.id');
  $this->db->order_by('id_pesan','ASC');
  $query = $this->db->get();
  return $query->result();
 }

 
 public function filterbytanggal($tanggalawal, $tanggalakhir)
   {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('pesan', 'barang.id_barang = pesan.id_pesan', 'left');
    $this->db->join('user', 'barang.id = user.id', 'left');
    
    // $this->db->where('tgl_pesan >=');
    // $this->db->where('tgl_pesan <=');
    
    $this->db->order_by('id_pesanan','ASC');
    $query = $this->db->get();
    return $query->result();
   }

 public function datalap($b,$t){
  $this->db->select('*');
  $this->db->from('barang');
  $this->db->join('pesan', 'barang.id_barang = pesan.id_pesan', 'left');
  $this->db->where('MONTH(pesan.tgl_pesan)',$b);
  $this->db->where('YEAR(pesan.tgl_pesan)',$t);

  $this->db->order_by('tgl_pesan', 'ASC');
  $query = $this->db->get(); 
  return $query->result();
}
}


?>