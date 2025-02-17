<?php 

class Books extends CI_Controller {

    public function __construct () {
        parent::__construct();
        $this->load->database();
        $this->load->model('books_model');
        $this->load->helper('url');
    }

    public function index () {
        $this->load->view('books/index');
    }
    public function books_data () {
        $draw = $this->input->get('draw');
        $start = $this->input->get('start');
        $length = $this->input->get('length');
        $order = $this->input->get('order');

        $col = 0;
        $sort = "";

        if (!empty($order)) {
            foreach($order as $o) {
                $col = $o['column'];
                $sort = $o['dir'];
            }
        }

        $columns_valid = [
            "name",
            "price",
            "author",
            "rating",
            "publisher"
        ];
        $order_by=null;

        if(isset($columns_valid[$col])) {
            $order_by = $columns_valid[$col];
        }


        $total_books = $this->books_model->getTotalBooks();

        $books = $this->books_model->getBooks($start, $length, $order_by, $sort);
        $data = array();
        foreach($books->result() as $book) {
            $data [] = array (
                $book->name,
                $book->price,
                $book->author,
                $book->rating,
                $book->publisher,
            );
        }
        $output = array (
            'draw' => $draw,
            'recordsTotal' => $total_books,
            'recordsFiltered' => $total_books,
            'data' => $data
        );
        echo json_encode($output);
        exit();
    }
}

?>