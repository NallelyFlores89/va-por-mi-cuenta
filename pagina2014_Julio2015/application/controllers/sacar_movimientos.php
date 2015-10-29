<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sacar_movimientos extends CI_Controller{

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

            for($i = 1 ; $i<=31; $i++){
                $data['dias'][$i] = $i;
            }
            for($i = 1 ; $i<=12; $i++){
                $data['meses'][$i] = $i;
            }
            for($i = 2014 ; $i<=2020; $i++){
                $data['anos'][$i] = $i;
            }           
            $this->load->view("administradorMovimientos", $data);
        }else{
            echo "<script>alert('necesitas ser administrador');
            window.location = '".base_url()."index.php/sacar_movimientos/loginAdmin';</script>";
        }
    }

    function loginAdmin(){
        $data['header'] = $this->load->view("header",null,true);
        $data['footer'] = $this->load->view("footer",null,true);        
        if($_POST != NULL){
            if($_POST['correo'] == 'carlos@deklan.net' && $_POST['pass'] == 'admin'){
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

    function file_xls(){
        if($_POST != NULL){
            $datos = $this->apadrina_modelo->trae_reporte();
            $this->excel->setActiveSheetIndex(0);
            //name the worksheet
            $this->excel->getActiveSheet()->setTitle('Movimientos');
            //set cell A1 content with some text
            $i = 0;
            $this->excel->getActiveSheet()->setCellValue('A'.(string)($i+1), "num movimiento");
            $this->excel->getActiveSheet()->setCellValue('B'.(string)($i+1), "nombre padrino");
            $this->excel->getActiveSheet()->setCellValue('C'.(string)($i+1), "nombre nino");
            $this->excel->getActiveSheet()->setCellValue('D'.(string)($i+1), "correo padrino");
            $this->excel->getActiveSheet()->setCellValue('E'.(string)($i+1), "donacion");
            $this->excel->getActiveSheet()->setCellValue('F'.(string)($i+1), "numero de comidas");
            $this->excel->getActiveSheet()->setCellValue('G'.(string)($i+1), "movimiento");
            $this->excel->getActiveSheet()->setCellValue('H'.(string)($i+1), "fecha");        
            $i = 1;
            if($datos == -1){
                echo "<script>alert('no hay movimientos registrados en la bd');
                window.location = '".base_url()."index.php/sacar_movimientos/sacar_movimientos';</script>";                
            }else{
                foreach ($datos as $key => $value) {
                    $this->excel->getActiveSheet()->setCellValue('A'.(string)($i+1), $value['idmovimientos']);
                    $this->excel->getActiveSheet()->setCellValue('B'.(string)($i+1), $value['nombre_padrino']);
                    $this->excel->getActiveSheet()->setCellValue('C'.(string)($i+1), $value['nombre_nino']);
                    $this->excel->getActiveSheet()->setCellValue('D'.(string)($i+1), $value['correo_padrino']);
                    $this->excel->getActiveSheet()->setCellValue('E'.(string)($i+1), $value['donacion']);
                    $this->excel->getActiveSheet()->setCellValue('F'.(string)($i+1), $value['num_comidas']);
                    $this->excel->getActiveSheet()->setCellValue('G'.(string)($i+1), $value['movimiento']);
                    $this->excel->getActiveSheet()->setCellValue('H'.(string)($i+1), $value['fecha']);
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
        }else{
            echo "error";
        }
    }

    function file_xls2(){
        if($_POST != NULL){
            $fecha = $_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia'];
            $datos = $this->apadrina_modelo->trae_reporte_fecha($fecha);
            $this->excel->setActiveSheetIndex(0);
            //name the worksheet
            $this->excel->getActiveSheet()->setTitle('Movimientos');
            //set cell A1 content with some text
            $i = 0;
            $this->excel->getActiveSheet()->setCellValue('A'.(string)($i+1), "num movimiento");
            $this->excel->getActiveSheet()->setCellValue('B'.(string)($i+1), "nombre padrino");
            $this->excel->getActiveSheet()->setCellValue('C'.(string)($i+1), "nombre nino");
            $this->excel->getActiveSheet()->setCellValue('D'.(string)($i+1), "correo padrino");
            $this->excel->getActiveSheet()->setCellValue('E'.(string)($i+1), "donacion");
            $this->excel->getActiveSheet()->setCellValue('F'.(string)($i+1), "numero de comidas");
            $this->excel->getActiveSheet()->setCellValue('G'.(string)($i+1), "movimiento");
            $this->excel->getActiveSheet()->setCellValue('H'.(string)($i+1), "fecha");        
            $i = 1;
            if($datos == -1){
                echo "<script>alert('no hay movimientos registrados en la bd para esta fecha');
                window.location = '".base_url()."index.php/sacar_movimientos/sacar_movimientos';</script>";               
            }else{
                foreach ($datos as $key => $value) {
                    $this->excel->getActiveSheet()->setCellValue('A'.(string)($i+1), $value['idmovimientos']);
                    $this->excel->getActiveSheet()->setCellValue('B'.(string)($i+1), $value['nombre_padrino']);
                    $this->excel->getActiveSheet()->setCellValue('C'.(string)($i+1), $value['nombre_nino']);
                    $this->excel->getActiveSheet()->setCellValue('D'.(string)($i+1), $value['correo_padrino']);
                    $this->excel->getActiveSheet()->setCellValue('E'.(string)($i+1), $value['donacion']);
                    $this->excel->getActiveSheet()->setCellValue('F'.(string)($i+1), $value['num_comidas']);
                    $this->excel->getActiveSheet()->setCellValue('G'.(string)($i+1), $value['movimiento']);
                    $this->excel->getActiveSheet()->setCellValue('H'.(string)($i+1), $value['fecha']);
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
        }else{
            echo "error";
        }
    }

    function  file_xls3(){
        if($_POST != NULL){
            $datos = $this->apadrina_modelo->trae_reporte_ninos_padrinos();
            $this->excel->setActiveSheetIndex(0);
            //name the worksheet
            $this->excel->getActiveSheet()->setTitle('Movimientos');
            //set cell A1 content with some text
            $i = 0;
            $this->excel->getActiveSheet()->setCellValue('A'.(string)($i+1), "nombre padrino");
            $this->excel->getActiveSheet()->setCellValue('B'.(string)($i+1), "número de empleado");
            $this->excel->getActiveSheet()->setCellValue('C'.(string)($i+1), "nombre nino");
            $this->excel->getActiveSheet()->setCellValue('D'.(string)($i+1), "correo padrino");
            $this->excel->getActiveSheet()->setCellValue('E'.(string)($i+1), "donacion");
            $this->excel->getActiveSheet()->setCellValue('F'.(string)($i+1), "numero de comidas");
            $this->excel->getActiveSheet()->setCellValue('G'.(string)($i+1), "último movimiento");
            $this->excel->getActiveSheet()->setCellValue('H'.(string)($i+1), "fecha");

            $i = 1;
            if($datos == -1){
                echo "<script>alert('no hay datos en la bd')</script>";
            }else{
                foreach ($datos as $key => $value) {
                    $this->excel->getActiveSheet()->setCellValue('A'.(string)($i+1), $value['nombre_padrino']);
                    $this->excel->getActiveSheet()->setCellValue('B'.(string)($i+1), (string)$value['num_empleado']);
                    $this->excel->getActiveSheet()->setCellValue('C'.(string)($i+1), $value['nombre_nino']);
                    $this->excel->getActiveSheet()->setCellValue('D'.(string)($i+1), $value['correo_padrino']);
                    $this->excel->getActiveSheet()->setCellValue('E'.(string)($i+1), $value['donacion']);
                    $this->excel->getActiveSheet()->setCellValue('F'.(string)($i+1), $value['num_comidas']);
                    $this->excel->getActiveSheet()->setCellValue('G'.(string)($i+1), $value['movimientos']['movimiento']);
                    if($value['movimientos']['fecha'] != NULL){
                        $this->excel->getActiveSheet()->setCellValue('H'.(string)($i+1), $value['movimientos']['fecha']);
                    }else{
                        $this->excel->getActiveSheet()->setCellValue('H'.(string)($i+1), 'no fecha');
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
        }else{
            echo "error";
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