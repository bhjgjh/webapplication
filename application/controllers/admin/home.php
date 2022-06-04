     <?php

      Class Home extends CI_Controller
           {
      public function __construct()
            {
        parent::__construct();
         $admin = $this->session->userdata('admin'); // iska use direct dashboard me na ja sake uske liye karte hai niche ke 3 line uske liye he hai
          if(empty($admin)){
          redirect(base_url().'admin/login/index');
              }
               }

        public function index()
                {
         $admin = $this->session->userdata('admin');
         $this->load->view("admin/dashboard");
                }
                  }
                ?>
