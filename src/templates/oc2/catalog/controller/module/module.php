<?php
/**
 * Class ControllerModule{{moduleClassName}}
 *
 * @module   {{moduleTitle}}
 * @author   {{author}}
 * @created  {{created}}
 */

class ControllerModule{{moduleClassName}} extends Controller
{


    public function index()
    {
        $status = $this->config->get('{{moduleName}}_status');

        if ($status == 1) {
            // Load model
            $this->load->model('module/{{moduleName}}');

            $data['text']      = $this->model_module_{{moduleName}}->getText();

            if(VERSION < '2.2.0.0'){
                if (file_exists(DIR_TEMPLATE.$this->config->get('config_template')
                    .'/template/module/{{moduleName}}.tpl')
                ) {
                    return $this->load->view($this->config->get('config_template')
                        .'/template/module/{{moduleName}}.tpl',
                        $data);
                } else {
                    return $this->load->view('default/template/module/{{moduleName}}.tpl', $data);
                }
            }
            else{
                return $this->load->view('module/{{moduleName}}.tpl', $data);
            }
        }

        return false;
    }

}
