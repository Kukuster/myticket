<?php

class page
{
    
    private $id;
    
    private $name;
    
    private $url;
    
    private $page_template;
    
    private $page_title;
    
    
    private $page_settings = array();
    
    
    function __construct($id, $name, $url, $page_template, $page_title, array $page_settings=array()){
        $this->id = $id;
        $this->name = $name;
        $this->url = $url;
        $this->page_template = $page_template;
        $this->page_title = $page_title;
        $this->page_settings = $page_settings;
        
        global $pages;
        $pages[$id] = $this;
        
    }
    
    
    
    public function get_id(){
        return $this->id;
    }
    
    public function get_name(){
        return $this->name;
    }
    
    public function get_url(){
        global $site_url;
        
        if (empty($this->url)){
            if ($site_url){
                return $site_url;
            } else {
                return '/';
            }
        
        } else {
            if ($site_url){
                return $site_url.'/'.$this->url.'/';
            } else {
                return '/'.$this->url.'/';
            }
            
        }
        
        
    }
    
    public function get_page_template(){
        return $this->page_template;
    }
    
    public function get_page_title(){
        return $this->page_title;
    }
    
    public function get_page_settings(){
        return $this->page_settings;
    }
    
    public function get_page_setting($key){
        if (isset($this->page_settings[$key]) && !empty($this->page_settings[$key])){
            return $this->page_settings[$key];
        } else {
            return NULL;
        }
        
    }
    
    
    
    public function is_requested_page($url){
        if (empty($this->url) && empty($url)){
            return true;
        }
        
        if ('/'.$this->url == $url || '/'.$this->url.'/' == $url){
            return true;
        }
        
        return false;
        
    }
    
    
    
    public function load_page(){
        global $language_data;
        get_template($this->page_template, array(
            'page'=>$this,
            'language_data'=>$language_data,
        ));
    }
    
    
}