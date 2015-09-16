<?php
if($this->router->class == "admincp"){
    if ($this->router->fetch_method() == 'index'){
      $this->load->view('admincp/home/index');
    }
}

if($this->router->class == "user"){
    if ($this->router->fetch_method() == 'index'){
      $this->load->view('admincp/user/listuser');
    }
    if ($this->router->fetch_method() == 'add'){
      $this->load->view('admincp/user/adduser');
    }
}

if($this->router->class == "member"){
    if ($this->router->fetch_method() == 'index'){
      $this->load->view('admincp/member/profile');
    }
    if ($this->router->fetch_method() == 'history'){
      $this->load->view('admincp/member/history');
    }
}
