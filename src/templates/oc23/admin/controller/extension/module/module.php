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

    private $error = array();

    public function index()
    {
        $data = $this->load->language('extension/module/{{moduleName}}');
        $this->document->setTitle($data['heading_title']);

        $this->load->model('setting/setting');
        $this->load->model('extension/module/{{moduleName}}');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

            $this->model_setting_setting->editSetting('{{moduleName}}', $this->request->post);
            $this->session->data['success'] = $data['text_success'];
            $this->response->redirect($this->url->link('extension/module/{{moduleName}}',
                'token='.$this->session->data['token'], 'SSL'));
        }

        $data['demoData'] = $this->model_extension_module_{{moduleName}}->getDemoData();


        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];

            unset($this->error['warning']);
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }


        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token='.$this->session->data['token'], 'SSL'),
            'separator' => false,
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_module'),
            'href'      => $this->url->link('extension/extension', 'token='.$this->session->data['token'], 'SSL'),
            'separator' => ' :: ',
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('extension/module/{{moduleName}}', 'token='.$this->session->data['token'], 'SSL'),
            'separator' => ' :: ',
        );

        $data['action'] = $this->url->link('extension/module/{{moduleName}}', 'token='.$this->session->data['token'], 'SSL');
        $data['cancel'] = $this->url->link('extension/extension', 'token='.$this->session->data['token'], 'SSL');


        if (isset($this->request->post['{{moduleName}}_status'])) {
            $data['{{moduleName}}_status'] = $this->request->post['{{moduleName}}_status'];
        } else {
            $data['{{moduleName}}_status'] = $this->config->get('{{moduleName}}_status');
        }

        $this->load->model('design/layout');
        $data['layouts'] = $this->model_design_layout->getLayouts();

        $data['header']      = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer']      = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/{{moduleName}}.tpl', $data));
    }

    /**
     * @return bool
     */
    protected function validate()
    {

        // Block to check the user permission to manipulate the module
        if ( ! $this->user->hasPermission('modify', 'extension/module/{{moduleName}}')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        // Block returns true if no error is found, else false if any error detected
        if ( ! $this->error) {
            return true;
        } else {
            return false;
        }
    }

    public function install()
    {
    }

    public function uninstall()
    {
    }

}