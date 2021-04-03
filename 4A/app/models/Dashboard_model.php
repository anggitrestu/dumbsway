<?php
class Dashboard_model
{
    private $table = 'books';
    private $categories = 'categories';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllBuku()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getAllCategories()
    {
        $this->db->query('SELECT * FROM ' . $this->categories);
        return $this->db->resultSet();
    }
    public function tambahDataBuku($data)
    {
        $rand = rand();
        $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
        $filename = $_FILES['image']['name'];
        $ukuran = $_FILES['image']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $ekstensi)) {
            header('Location: ' . BASEURL . '/dashboard');
        } else {
            if ($ukuran < 1044070) {
                $xx = $rand . '_' . $filename;
                move_uploaded_file($_FILES["image"]["tmp_name"], 'uploads/' . $xx);
                $query = "INSERT INTO $this->table
                    VALUES
                ('', :name, :stok, :image, :deskripsi, :category_id )";
                $this->db->query($query);
                $this->db->bind('name', $data['name']);
                $this->db->bind('stok', $data['stok']);
                $this->db->bind('deskripsi', $data['deskripsi']);
                $this->db->bind('category_id', $data['category_id']);
                $this->db->bind('image', $xx);
                $this->db->execute();
                return $this->db->rowCount();
            } else {

                header('Location: ' . BASEURL . '/dashboard');
            }
        }
    }
    public function getBukuById($id)
    {
        $this->db->query("SELECT $this->table.*, $this->categories.name as namecategories,  $this->categories.id as idcategories FROM  $this->table INNER JOIN $this->categories ON $this->table.category_id=$this->categories.id WHERE $this->table.id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function ubahDataBuku($data)
    {
        $filename = $_FILES['image']['name'];
        $rand = rand();
        $xx = $rand . '_' . $filename;
        move_uploaded_file($_FILES["image"]["tmp_name"], 'uploads/' . $xx);
        $query = "UPDATE books SET
                       name = :name,
                       stok = :stok,
                       image = :image,
                       deskripsi = :deskripsi,
                       category_id = :category_id
                       WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('category_id', $data['category_id']);
        $this->db->bind('image', $xx);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusDataBuku($id)
    {
        $query = "DELETE FROM books WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
