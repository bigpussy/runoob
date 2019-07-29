<?php 
class Settings{
    var $_settings = array();
    /**
     * 获取某些设置的值
     *
     * @param unknown_type $var
     * @return unknown
     */
    function get($var) {
        $var = explode('.', $var);
        
        $result = $this->_settings;
        foreach ($var as $key) {
            if (!isset($result[$key])) { return false; }
            
            $result = $result[$key];
        }
        
        return $result;
        
        
        // trigger_error ('Not yet implemented', E_USER_ERROR);//引发一个错误
    }
    
    function load($file) {
        trigger_error ('Not yet implemented', E_USER_ERROR);
    }
    
    
}


Class Settings_PHP Extends Settings {
    function load ($file) {
        if (file_exists($file) == false) { return false; }
        
        // Include file
        include ($file);
        unset($file);   //销毁指定变量
        $vars = get_defined_vars(); //返回所有已定义变量的列表,数组,变量包括服务器等相关变量,
        //通过foreach吧$file引入的变量给添加到$_settings这个成员数组中去.
        foreach ($vars as $key => $val) {
            if ($key == 'this') continue;
            
            $this->_settings[$key] = $val;
        }
        
    }
}
?>