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
        $status = $this->config->get('module_{{moduleName}}_status');

        if ($status == 1) {
            // Load model
            $this->load->model('extension/module/{{moduleName}}');

            $data['text']      = $this->model_extension_module_{{moduleName}}->getText();

            return $this->load->view('extension/module/{{moduleName}}', $data);
        }

        return false;
    }

}