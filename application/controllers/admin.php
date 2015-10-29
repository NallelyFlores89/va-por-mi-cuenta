<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller{

    function __construct(){
        parent::__construct();
        header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
        $this->load->helper(array('html', 'url','form'));
        $this->load->library(array('session','excel'));
        $this->load->model(array("padrinos", "apadrina_modelo")); //Cargando el modelo
    }

    function index(){
        if($this->session->userdata('login') == TRUE){
            $data['header'] = $this->load->view("header",null,true);
            $data['footer'] = $this->load->view("footer",null,true);

            $this->load->view("administrador2", $data);
        }else{
            echo "<script>alert('necesitas ser administrador');
            window.location = '".base_url()."index.php/admin/loginAdmin';</script>";
        }
    }

    function loginAdmin(){
        $data['header'] = $this->load->view("header",null,true);
        $data['footer'] = $this->load->view("footer",null,true);        
        if($_POST != NULL){
            if($_POST['correo'] == 'nallely@deklan.net' && $_POST['pass'] == 'putos'){
                $data = array(
                    'login' => true
                );
                $this->session->set_userdata($data);                
               redirect("sacar_movimientos");
            }else{
               /* echo "error";
                $this->load->view("administrador", $data);*/
            }
        }
        $this->load->view("administrador", $data);
    }

    function salir(){
            
        $this->session->sess_destroy();
        $this->index();
    }

    function importcsv() {
        $data['addressbook'] = $this->csv_model->get_addressbook();
        $data['error'] = ''; //initialize image upload error array to empty
         
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
         
        $this->load->library('upload', $config);
         
         
        // If upload failed, display error
        if (!$this->upload->do_upload()) {
        $data['error'] = $this->upload->display_errors();
         
        $this->load->view('csvindex', $data);
        } else {
        $file_data = $this->upload->data();
        $file_path = './uploads/'.$file_data['file_name'];
         
        if ($this->csvimport->get_array($file_path)) {
        $csv_array = $this->csvimport->get_array($file_path);
        foreach ($csv_array as $row) {
        $insert_data = array(
        'firstname'=>$row['firstname'],
        'lastname'=>$row['lastname'],
        'phone'=>$row['phone'],
        'email'=>$row['email'],
        );
        $this->csv_model->insert_csv($insert_data);
        }
        $this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
        redirect(base_url().'csv');
        //echo "<pre>"; print_r($insert_data);
        } else
        $data['error'] = "Error occured";
        $this->load->view('csvindex', $data);
        }
     
    }     

    
    function  excel_ninos_x_comedor($idcomedor){
            $datos = $this->apadrina_modelo->trae_reporte_ninos_comedor($idcomedor);

            $this->excel->setActiveSheetIndex(0);
            //name the worksheet
            $this->excel->getActiveSheet()->setTitle('Ninos');
            //set cell A1 content with some text
            $i = 0;
            $this->excel->getActiveSheet()->setCellValue('A'.(string)($i+1), "nombre niño");
            $this->excel->getActiveSheet()->setCellValue('B'.(string)($i+1), "apellido pat niño");
            $this->excel->getActiveSheet()->setCellValue('C'.(string)($i+1), "apellido mat niño");
            $this->excel->getActiveSheet()->setCellValue('D'.(string)($i+1), "género");
            $this->excel->getActiveSheet()->setCellValue('E'.(string)($i+1), "comedor");
            $this->excel->getActiveSheet()->setCellValue('F'.(string)($i+1), "estado");

            $i = 1;
            if($datos == -1){
                echo "<script>alert('no hay datos en la bd')</script>";
            }else{
                foreach ($datos as $key => $value) {
                    $this->excel->getActiveSheet()->setCellValue('A'.(string)($i+1), $value['nombre']);
                    $this->excel->getActiveSheet()->setCellValue('B'.(string)($i+1), (string)$value['apat']);
                    $this->excel->getActiveSheet()->setCellValue('C'.(string)($i+1), $value['amat']);
                    $this->excel->getActiveSheet()->setCellValue('D'.(string)($i+1), $value['nombre_comedor']);
                    if($value['genero_idgenero'] == 1){
                        $this->excel->getActiveSheet()->setCellValue('E'.(string)($i+1), "femenino");
                    }else{
                        $this->excel->getActiveSheet()->setCellValue('E'.(string)($i+1), 'masculino');
                    }
                    if($value['apadrinado'] == 1){
                        $this->excel->getActiveSheet()->setCellValue('F'.(string)($i+1), "apadrinado");
                    }else{
                        $this->excel->getActiveSheet()->setCellValue('F'.(string)($i+1), 'no apadrinado');
                    }
                    $i++;
                }

                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                 
                $filename='movimientos_va_por_mi_cuenta.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                             
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
            }

    }    
}