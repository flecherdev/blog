<?php

namespace app\controllers\admin;

class IndexController{

    public function getIndex(){
        return  render('../views/admin/index.php');    
    }
}

?>