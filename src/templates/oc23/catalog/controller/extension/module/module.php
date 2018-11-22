<?php
/**
 * Class ControllerExtensionModule{{moduleClassName}}
 *
 * @module   {{moduleTitle}}
 * @author   {{author}}
 * @created  {{created}}
 */

class ControllerExtensionModule{{moduleClassName}} extends Controller
{


    public function index()
    {
        $status = $this->config->get('{{moduleName}}_status');

        if ($status == 1) {
            // Load model
            $this->load->model('extension/module/{{moduleName}}');

            $data['text']      = $this->model_extension_module_{{moduleName}}->getText();

            if (file_exists(DIR_TEMPLATE.$this->config->get('config_template')
                .'/template/extension/module/{{moduleName}}.tpl')
            ) {
                return $this->load->view($this->config->get('config_template')
                    .'/template/extension/module/{{moduleName}}.tpl',
                    $data);
            } else {
                return $this->load->view('extension/module/{{moduleName}}.tpl', $data);
            }
        }

        return false;
    }

}