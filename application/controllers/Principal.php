<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Bases');
     $this->load->config('grocery_crud');
     $this->config->set_item('grocery_crud_xss_clean', true);
     $this->load->library('grocery_CRUD');
  } 
	public function index()
	{
    //$data["producto"]=$this->Bases->getProducto();
		$this->load->view('header');
		$this->load->view('barra_navegacion');
		$this->load->view('inicio'); //$this->load->view('principal',$data);
		$this->load->view('footer');
  }
  //GESTION DE USUARIOS
	public function validaUsuario()
	{
		$usuario=$this->input->post('usuario',TRUE);
		$password=$this->input->post('password',TRUE);
       $data = array(
               'usuario'=> $usuario,'password'=>$password);
       $data["usuario"]=$this->Bases->validaUsuario($data);

       if ($data["usuario"]==FALSE)
         redirect('/Principal/', 'location');
       else
       	{
          $usuario=$data["usuario"]->row_array(0);
          $datasession = array(
            'login'=> $usuario["login"],
            'password'=> $usuario["password"],
            'nivel'=> $usuario["nivel"],);
          $this->session->set_userdata($datasession);
          //$data["producto"]=$this->Bases->getProducto();
          $this->load->view('header');
		      $this->load->view('barra_navegacion');
          $this->load->view('inicio');//$this->load->view('inicio',$data);
          $this->load->view('footer');
       	}
  }
  public function cerrar_sesion()
  {
    $datasession = array('nivel' => '');
    $this->session->unset_userdata($datasession);
    $this->session->sess_destroy();
    redirect('/Principal/index/', 'refresh');
  }
  public function registroUsuario(){
    $this->load->view('header');
		$this->load->view('barra_navegacion');
    $this->load->view('registro_usuario');
  }
  public function loginBienvenida(){
    $this->load->view('header');
		$this->load->view('barra_navegacion');
    $this->load->view('login_bienvenida');
  }
  /*ENVIO FORMULARIO DE USUARIOS*/
	public function insertaUsuario(){
		$nombre = $this->input->post('nombre', TRUE);
    $apellidoPaterno = $this->input->post('paterno', TRUE);
		$apellidoMaterno = $this->input->post('materno', TRUE);
    $curp = $this->input->post('curp', TRUE);
    $rfc = $this->input->post('rfc', TRUE);
    $cuentaBank = $this->input->post('cuenta_bancaria', TRUE);
		$usuario = $this->input->post('login', TRUE);
    $password = $this->input->post('password', TRUE);
    $tipoCliente = $this->input->post('tipoCliente', TRUE);
    $tipoEvento = $this->input->post('tipoEvento', TRUE);
		$data = array(
               'nombre'=> $nombre,
              'apellidoPaterno' => $apellidoPaterno,
							'apellidoMaterno' => $apellidoMaterno,
              'curp' => $curp,
              'rfc' => $rfc,
              'cuentaBank' => $cuentaBank,
              'usuario' => $usuario,
              'tipoEvento' => $tipoEvento);
    $data2 = array(
							'usuario' => $usuario,
              'password' => $password,
              'tipoUsuario' => $tipoCliente);
    
    $this->Bases->insertaUsuarioLogin($data2);
    $this->Bases->insertaUsuario($data);
    
    //Iniciar sesion
    $dataCliente = array('usuario'=> $usuario,'password'=>$password);
    $dataCliente["usuario"]=$this->Bases->validaUsuario($dataCliente);
    $usuario=$dataCliente["usuario"]->row_array(0);
    $datasession = array(
            'login'=> $usuario["login"],
            'password'=> $usuario["password"],
            'nivel'=> $usuario["nivel"],);
    $this->session->set_userdata($datasession);
    $this->load->view('header');
		$this->load->view('barra_navegacion');
    $this->load->view('login_bienvenida');          
    //redirect('/Principal/loginBienvenida', 'refresh');
  }
  public function registroExitoso(){
    $this->load->view('header');
		$this->load->view('barra_navegacion');
    $this->load->view('registro_exitoso');
  }
  /*ENVIO FORMULARIO DE ADM DE EVENTOS*/
	public function insertaAdmEventos(){
		$nombre = $this->input->post('nombre', TRUE);
    $apellidoPaterno = $this->input->post('paterno', TRUE);
		$apellidoMaterno = $this->input->post('materno', TRUE);
    $cuentaBank = $this->input->post('cuenta_bancaria', TRUE);
		$usuario = $this->input->post('login', TRUE);
    $password = $this->input->post('password', TRUE);
    $tipoUsuario = $this->input->post('tipoUsuario', TRUE);
		$data = array(
               'nombre'=> $nombre,
              'apellidoPaterno' => $apellidoPaterno,
							'apellidoMaterno' => $apellidoMaterno,
              'cuentaBank' => $cuentaBank,
              'usuario' => $usuario);
    $data2 = array(
							'usuario' => $usuario,
              'password' => $password,
              'tipoUsuario' => $tipoUsuario);
    
    $this->Bases->insertaUsuarioLogin($data2);
    $this->Bases->insertaStaff($data);
    redirect('/Principal/registroExitoso', 'refresh');
  }
  /*VISTAS*/
  public function nosotros()
	{
		$this->load->view('header');
		$this->load->view('barra_navegacion');
		$this->load->view('nosotros');
		$this->load->view('footer');
  }
  public function servicios(){
    $this->load->view('header');
    $this->load->view('barra_navegacion');
    $this->load->view('footer');
    
  }
  public function _example_usuarios($output = null)
  {
      $this->load->view('header');
      $this->load->view('barra_navegacion');
      $this->load->view('footer');
  }
  public function usuarios()
  {
     try{
      $crud = new grocery_CRUD();
      $crud->set_table('usuario');
      $output = $crud->render();
      $this->_example_usuarios($output);
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }
  }
  public function _example_staff($output = null)
  {
      $this->load->view('header');
      $this->load->view('barra_navegacion');
      $this->load->view('footer');
  }
  public function staff()
  {
    $this->load->view('header');
    $this->load->view('barra_navegacion');
    $this->load->view('registro_adm_eventos');
     
  }
  public function _example_alquiladora($output = null)
  {
      $this->load->view('header');
      $this->load->view('barra_navegacion');
      $this->load->view('alquiladora',(array)$output);
      $this->load->view('footer');
  }
    
  public function mostrar_alquiladora()
  {
        try
        {
            $crud = new grocery_CRUD();
            $crud-> set_table('alquiladora');
            $crud-> columns('capacidad_mesa','diseño','modelo_silla','num_sillas','foto','precio','forro','loza','cristaleria','mesero','comentario','id_cuenta');
            $crud-> set_theme('Flexigrid');
            $crud-> required_fields('capacidad_mesa','diseño','modelo_silla','num_sillas','precio','forro','loza','cristaleria','mesero');
            $crud->set_relation('id_cuenta','cuenta_bancaria','{cuenta_bancaria} - {nombre_proveedor}');
            $crud->set_field_upload('foto','assets/uploads/files');
            $crud-> unset_export();
            $crud-> unset_print();
            $crud-> unset_clone();
            $output = $crud->render();
            $this->_example_alquiladora($output);
        }catch(Exception $e)
        {
            show_error($e->getMessage().' --- '.$e-> getTraceAsString());
        }
  }
  public function _example_floreria($output = null)
  {
      $this->load->view('header');
      $this->load->view('barra_navegacion');
      $this->load->view('floreria',(array)$output);
      $this->load->view('footer');  
  }
  public function mostrar_floreria()
  {
        try
        {
            $crud = new grocery_CRUD();
            $crud-> set_table('floreria');
            $crud-> columns('nombre','fotos','precio','comentario','id_cuenta');
            $crud-> set_theme('Flexigrid');
            $crud-> required_fields('nombre','precio');
            $crud->set_relation('id_cuenta','cuenta_bancaria','{cuenta_bancaria} - {nombre_proveedor}');
            $crud->set_field_upload('fotos','assets/uploads/files');
            $crud-> unset_export();
            $crud-> unset_print();
            $crud-> unset_clone();
            $output = $crud->render();
            $this->_example_floreria($output);
        }catch(Exception $e)
        {
            show_error($e->getMessage().' --- '.$e-> getTraceAsString());
        }
  }
  public function _example_salon($output = null)
  {
      $this->load->view('header');
      $this->load->view('barra_navegacion');
      $this->load->view('salon',(array)$output);
      $this->load->view('footer');  
  }
  public function mostrar_salon()
  {
        try
        {
            $crud = new grocery_CRUD();
            $crud-> set_table('salon');
            $crud-> columns('capacidad','ubicacion','fotos','telefono','precio','nombre','comentario', 'id_cuenta');
            $crud-> set_theme('Flexigrid');
            $crud-> required_fields('capacidad','ubicacion','telefono','precio','nombre','id_cuenta');
            $crud->set_relation('id_cuenta','cuenta_bancaria','{cuenta_bancaria} - {nombre_proveedor}');
            $crud->set_field_upload('fotos','assets/uploads/files');
            $crud-> unset_export();
            $crud-> unset_print();
            $crud-> unset_clone();
            $output = $crud->render();
            $this->_example_salon($output);
        }catch(Exception $e)
        {
            show_error($e->getMessage().' --- '.$e-> getTraceAsString());
        }
  }
  public function _example_musica($output = null)
  {
      $this->load->view('header');
      $this->load->view('barra_navegacion');
      $this->load->view('musica',(array)$output);
      $this->load->view('footer');  
  }
  public function mostrar_musica()
  {
        try
        {
            $crud = new grocery_CRUD();
            $crud-> set_table('musica');
            $crud-> columns('id_musica','nombre','comentario','id_tipoMusica','id_cuenta');
            $crud-> set_theme('Flexigrid');
            $crud-> required_fields('nombre','id_tipoMusica','id_cuenta');
            $crud->set_relation('id_tipoMusica','tipomusica','{id_tipoMusica} - {nombre}');
            $crud->set_relation('id_cuenta','cuenta_bancaria','{cuenta_bancaria} - {nombre_proveedor}');
            $crud-> unset_export();
            $crud-> unset_print();
            $crud-> unset_clone();
            $output = $crud->render();
            $this->_example_musica($output);
        }catch(Exception $e)
        {
            show_error($e->getMessage().' --- '.$e-> getTraceAsString());
        }
  }
  public function _example_comida($output = null)
  {
      $this->load->view('header');
      $this->load->view('barra_navegacion');
      $this->load->view('comida',(array)$output);
      $this->load->view('footer');  
  }
  public function mostrar_comida()
  {
        try
        {
            $crud = new grocery_CRUD();
            $crud-> set_table('comida');
            $crud-> columns('id_comida','nombre','fotos','precio','comentario','tipo_comida','id_cuenta');
            $crud-> set_theme('Flexigrid');
            $crud-> required_fields('id_comida','nombre','precio','tipo_comida','id_cuenta');
            $crud->set_relation('id_cuenta','cuenta_bancaria','{cuenta_bancaria} - {nombre_proveedor}');
            $crud->set_field_upload('fotos','assets/uploads/files');
            $crud-> unset_export();
            $crud-> unset_print();
            $crud-> unset_clone();
            $output = $crud->render();
            $this->_example_comida($output);
        }catch(Exception $e)
        {
            show_error($e->getMessage().' --- '.$e-> getTraceAsString());
        }
  }
  public function _example_entretenimiento($output = null)
  {
      $this->load->view('header');
      $this->load->view('barra_navegacion');
      $this->load->view('entretenimiento',(array)$output);
      $this->load->view('footer');  
  }
  public function mostrar_entretenimiento()
  {
        try
        {
            $crud = new grocery_CRUD();
            $crud-> set_table('entretenimiento');
            $crud-> columns('payasos','precio','comentario','id_cuenta');
            $crud-> set_theme('Flexigrid');
            $crud-> required_fields('payasos','precio','id_cuenta');
            $crud->set_relation('id_cuenta','cuenta_bancaria','{cuenta_bancaria} - {nombre_proveedor}');
            $crud-> unset_export();
            $crud-> unset_print();
            $crud-> unset_clone();
            $output = $crud->render();
            $this->_example_entretenimiento($output);
        }catch(Exception $e)
        {
            show_error($e->getMessage().' --- '.$e-> getTraceAsString());
        }
  }
}
